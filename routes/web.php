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




// ----------------------super admin routes ----------------------------
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

// ----------------------super and normal admin routes ----------------------------
// These routes are accessible by users with the 'super admin' and 'normal admin'
Route::prefix('admin')->middleware(['auth', 'role:1,0'])->group(function () {
    // Manage buildings
    Route::resource('buildings', BuildingsController::class)->only(['index', 'edit', 'update']);
});

// ----------------------normal admin routes ----------------------------
// These routes are only accessible by users with the 'normal admin' role (role ID = 0)

Route::prefix('admin')->middleware(['auth', 'role:0'])->group(function () {
    // Manage floors
    Route::resources([
        'floors' => FloorsController::class,
        'offices' => OfficesController::class,
        'companies' => CompaniesController::class,
        'employees' => EmployeesController::class,
        'positions' => PositionsController::class,
        'complaints' => ComplaintsController::class,
    ]);
});


// ----------------------public routes ----------------------------
// These routes are accessible to everyone
Route::get('/', [HomeController::class, 'index']);

// ----------------------auth routes ----------------------------
// These routes handle user authentication
Auth::routes(); 

