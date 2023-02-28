<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DomainsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

// These routes are only accessible by users with the 'super admin'
Route::prefix('admin')->middleware(['auth', 'role:1'])->group(function () {
    // Manage buildings
    Route::resource('buildings', BuildingsController::class)->only(['store','create','destroy']);
    Route::resources([
        'cities' => CitiesController::class,
        'domains' => DomainsController::class,
        'users' => UsersController::class,
    ]);
});

// These routes are accessible by users with the 'super admin' and 'normal admin'
Route::prefix('admin')->middleware(['auth', 'role:1,0'])->group(function () {
    // Manage buildings
    Route::resource('buildings', BuildingsController::class)->only(['index', 'edit', 'update']);
});

// These routes are accessible to everyone
Route::get('/', [HomeController::class, 'index']);

// These routes handle user authentication
Auth::routes();
