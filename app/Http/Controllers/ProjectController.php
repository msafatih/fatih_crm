<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!Auth::user()->role === 'admin' || !Auth::user()->role === 'manager') {
            return redirect()->route('dashboard.index');
        } else {
            $projects = Project::where('manager_id', null)->get();

            return view('dashboard.projects.index', compact('projects',));
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        if (!Auth::user()->role === 'admin' || !Auth::user()->role === 'manager') {
            return redirect()->route('projects.index');
        }
        return view('dashboard.projects.show', compact('project'));
    }

    public function approve(Project $project)
    {
        if (Auth::user()->role !== 'manager') {
            return redirect()->route('projects.index');
        }

        try {
            // Begin transaction
            DB::beginTransaction();

            // Update project status
            $project->update([
                'manager_id' => Auth::id(),
                'status' => 'approved',
            ]);

            $lead = $project->lead;

            // Find or create customer
            $customer = Customer::firstOrCreate(
                ['lead_id' => $lead->id],
                [
                    'name' => $lead->name,
                    'email' => $lead->email,
                    'phone' => $lead->phone,
                    'company' => $lead->company,
                ]
            );

            // Create subscription for the customer
            $customer->subscriptions()->create([
                'product_id' => $project->product_id,
                'start_date' => now(),
                'end_date' => now()->addYear(),
                'status' => 'active',
            ]);

            // Commit transaction
            DB::commit();

            return redirect()
                ->route('projects.index')
                ->with('success', 'Project berhasil disetujui dan subscription telah dibuat');
        } catch (\Exception $e) {
            // Rollback transaction on error
            DB::rollBack();

            return redirect()
                ->route('projects.index')
                ->with('error', 'Terjadi kesalahan saat menyetujui project. Silakan coba lagi.');
        }
    }

    public function reject(Project $project)
    {
        if (Auth::user()->role !== 'manager') {
            return redirect()->route('projects.index');
        }

        try {
            DB::beginTransaction();

            $project->update([
                'manager_id' => Auth::id(),
                'status' => 'rejected',
            ]);

            DB::commit();

            return redirect()
                ->route('projects.index')
                ->with('success', 'Project berhasil ditolak');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('projects.index')
                ->with('error', 'Terjadi kesalahan saat menolak project. Silakan coba lagi.');
        }
    }
}
