<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetTypeController;
use App\Http\Controllers\PipeController;

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
    Route::resource('projects.assets', AssetController::class);
    Route::resource('projects.pipes', PipeController::class);
    Route::resource('projects.pipes.assets', AssetController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
