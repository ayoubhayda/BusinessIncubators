<?php 
use App\Http\Controllers\PositionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DomainsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FloorsController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;


// ----------------------These routes handle user authentication ----------------------------

Auth::routes(); 


// ----------These routes are only accessible by users with the 'super admin' ----------------

Route::prefix('admin')->middleware(['auth', 'role:1'])->group(function () {
    // Manage buildings
    Route::resource('buildings', BuildingsController::class)->only(['store','create','destroy']);
    // Manage cities and domains and users and positions
    Route::resources([
        'cities' => CitiesController::class,
        'domains' => DomainsController::class,
        'users' => UsersController::class,
        'positions' => PositionsController::class,
    ]);
});

// -----These routes are accessible by users with the 'super admin' and 'normal admin' -----------

Route::prefix('admin')->middleware(['auth', 'role:1,0'])->group(function () {
    // Manage buildings
    Route::resource('buildings', BuildingsController::class)->only(['index', 'edit', 'update']);
});


// ---------These routes are only accessible by users with the 'normal admin'---------------

Route::prefix('admin')->middleware(['auth', 'role:0'])->group(function () {

    Route::prefix('buildings/{building}')->group(function () {

        Route::resources(['floors' => FloorsController::class]);

        Route::prefix('floors/{floor}')->group(function () {

            Route::resources(['offices' => OfficesController::class]);

            Route::prefix('offices/{office}')->group(function () {

                Route::resources(['companies' => CompaniesController::class]);

                Route::prefix('companies/{company}')->group(function () {

                    Route::resources(['employees' => EmployeesController::class]);

                })->middleware('can:view,company');
            })->middleware('can:view,office');
        })->middleware('can:view,floor');
    })->middleware('can:view,building');
});


// -------------These routes are accessible to everyone -------------------
Route::get('/', [HomeController::class, 'index']);

