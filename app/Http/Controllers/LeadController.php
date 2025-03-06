<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Product;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->role === 'sales') {
            $leads = Lead::where('sales_id', Auth::id())->get();
        } else {
            $leads = Lead::all();
        }
        $columns = array_keys(Lead::getTableColumns());

        return view('dashboard.leads.index', compact('leads', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::user()->role === 'sales') {
            return view('dashboard.leads.create');
        }
        return redirect()->route('leads.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeadRequest $request)
    {
        try {
            Lead::create($request->validated());

            return redirect()
                ->route('leads.index')
                ->with('success', 'Lead berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan lead. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
        if (!Auth::user()->role === 'sales') {
            return redirect()->route('leads.index');
        } elseif (Auth::user()->role === 'sales' && $lead->sales_id !== Auth::id()) {
            return redirect()->route('leads.index');
        }
        return view('dashboard.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        //
        if (!Auth::user()->role === 'sales') {
            return redirect()->route('leads.index');
        }
        return view('dashboard.leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        //
        try {
            $lead->update($request->validated());

            return redirect()
                ->route('leads.index')
                ->with('success', 'Lead berhasil diperbarui');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui lead');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        //
        try {
            $lead->delete();

            return redirect()
                ->route('leads.index')
                ->with('success', 'Lead berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat menghapus lead');
        }
    }

    public function createProject(Lead $lead)
    {

        if ($lead->sales_id !== Auth::id()) {
            return redirect()->route('leads.index');
        }
        $products = Product::all();

        return view('dashboard.leads.projects.create', compact('lead', 'products'));
    }

    public function storeProject(Request $request, Lead $lead)
    {

        $validatedData = request()->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $lead->projects()->create([
            'sales_id' => $lead->sales_id,
            'lead_id' => $lead->id,
            'product_id' => $validatedData['product_id'],
            'status' => 'waiting_approval',
            'manager_id' => null,
        ]);

        return redirect()
            ->route('leads.show', $lead)
            ->with('success', 'Project berhasil ditambahkan');
    }

    public function showProject(Lead $lead, Project $project)
    {
        if ($lead->sales_id !== Auth::id()) {
            return redirect()->route('leads.index');
        }
        return view('dashboard.leads.projects.show', compact('lead', 'project'));
    }

    public function editProject(Lead $lead, Project $project)
    {
        if ($lead->sales_id !== Auth::id()) {
            return redirect()->route('leads.index');
        }
        $products = Product::all();
        return view('dashboard.leads.projects.edit', compact('lead', 'project', 'products'));
    }


    public function updateProject(Lead $lead, Project $project)
    {
        if ($lead->sales_id !== Auth::id()) {
            return redirect()->route('leads.index');
        }
        $validatedData = request()->validate([
            'product_id' => 'required|exists:products,id',
        ]);
        $project->update([
            'product_id' => $validatedData['product_id'],
        ]);

        return redirect()
            ->route('leads.show', $lead)
            ->with('success', 'Project berhasil diperbarui');
    }

    public function destroyProject(Lead $lead, Project $project)
    {
        if ($lead->sales_id !== Auth::id()) {
            return redirect()->route('leads.index');
        }
        $project->delete();

        return redirect()
            ->route('leads.show', $lead)
            ->with('success', 'Project berhasil dihapus');
    }
}
