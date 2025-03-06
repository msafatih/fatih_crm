<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('leads', LeadController::class);

    Route::prefix('leads/{lead}/projects')->group(function () {
        Route::get('create', [LeadController::class, 'createProject'])->name('leads.projects.create');
        Route::post('store', [LeadController::class, 'storeProject'])->name('leads.projects.store');
        Route::get('{project}', [LeadController::class, 'showProject'])->name('leads.projects.show');
        Route::get('{project}/edit', [LeadController::class, 'editProject'])->name('leads.projects.edit');
        Route::put('{project}/update', [LeadController::class, 'updateProject'])->name('leads.projects.update');
        Route::delete('{project}', [LeadController::class, 'destroyProject'])->name('leads.projects.destroy');
    });

    Route::resource('products', ProductController::class)->except('show');
    Route::resource('projects', ProjectController::class)->only(['index', 'show']);
    Route::patch('projects/{project}/approve', [ProjectController::class, 'approve'])->name('projects.approve');
    Route::patch('projects/{project}/reject', [ProjectController::class, 'reject'])->name('projects.reject');

    Route::resource('customers', CustomerController::class)->only(['index', 'show']);
});

require __DIR__ . '/auth.php';
