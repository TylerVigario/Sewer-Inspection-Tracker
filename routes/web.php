<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Models\Project;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Customers
    Route::get('/customers', function () {
        return view('customers', ['customers' => App\Models\Customer::all()]);
    })->name('customers');

    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customers/create', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::patch('/customers/{customer}', [CustomerController::class, 'update'])->name('customer.update');

    // Projects
    Route::get('/projects', function () {
        return view('projects', ['projects' => App\Models\Project::all()]);
    })->name('projects');

    Route::get('/projects/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/projects/create', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('project.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
