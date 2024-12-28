<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AssetTypeController;
use App\Http\Controllers\Assets\AssetController;
use App\Http\Controllers\Assets\ProjectAssetController;
use App\Http\Controllers\Pipes\PipeController;
use App\Http\Controllers\Pipes\ProjectPipeController;
use App\Http\Controllers\Pipes\ProjectAssetPipeController;
use App\Http\Controllers\Inspections\InspectionController;
use App\Http\Controllers\Inspections\ProjectInspectionController;
use App\Http\Controllers\Inspections\ProjectPipeInspectionController;
use App\Http\Controllers\Cleanings\CleaningController;
use App\Http\Controllers\Cleanings\ProjectCleaningController;
use App\Http\Controllers\Cleanings\ProjectPipeCleaningController;
use App\Http\Controllers\Installations\InstallationController;
use App\Http\Controllers\Installations\ProjectInstallationController;
use App\Http\Controllers\Installations\ProjectAssetInstallationController;

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
    Route::resource('inspections', InspectionController::class);
    Route::resource('cleanings', CleaningController::class);
    Route::resource('installations', InstallationController::class);

        // Project Context
        Route::resource('projects.assets', ProjectAssetController::class);
        Route::resource('projects.pipes', ProjectPipeController::class);
        Route::resource('projects.inspections', ProjectInspectionController::class);
        Route::resource('projects.cleanings', ProjectCleaningController::class);
        Route::resource('projects.installations', ProjectInstallationController::class);

        // Project & Asset Context
        Route::resource('projects.assets.pipes', ProjectAssetPipeController::class);
        Route::resource('projects.assets.installations', ProjectAssetInstallationController::class);

        // Project & Pipe Context
        Route::resource('projects.pipes.inspections', ProjectPipeInspectionController::class);
        Route::resource('projects.pipes.cleanings', ProjectPipeCleaningController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
