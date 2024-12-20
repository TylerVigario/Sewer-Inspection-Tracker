<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetTypeController;
use App\Http\Controllers\CleaningActivityController;
use App\Http\Controllers\InspectionActivityController;
use App\Http\Controllers\InstallationActivityController;
use App\Http\Controllers\PipeController;
use App\Http\Controllers\ProjectAssetController;
use App\Http\Controllers\ProjectPipeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('asset-types', AssetTypeController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('assets', AssetController::class);
    Route::resource('pipes', PipeController::class);
    Route::resource('inspection-activities', InspectionActivityController::class);
    Route::resource('cleaning-activities', CleaningActivityController::class);
    Route::resource('installation-activities', InstallationActivityController::class);

    // Project Context
    Route::resource('projects.assets', ProjectAssetController::class)->only(['create', 'show', 'edit']);
    Route::resource('projects.pipes', ProjectPipeController::class)->only(['create', 'show', 'edit']);

    // Project & Asset Context
    Route::resource('projects.assets.pipes', PipeController::class)->only('create');
    Route::resource('projects.pipes.inspection-activities', InspectionActivityController::class)->only('create');
    Route::resource('projects.pipes.cleaning-activities', CleaningActivityController::class)->only('create');
    Route::resource('projects.assets.installation-activities', InstallationActivityController::class)->only('create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
