<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DomainsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FloorsController;
use App\Http\Controllers\OfficesController;




// ----------------------super admin routes ----------------------------
// These routes are only accessible by users with the 'super admin' role (role ID = 1)
Route::prefix('admin')->middleware(['auth', 'role:1'])->group(function () {
    // Destroy a specific building
    Route::delete('buildings/{building}/destroy', [BuildingsController::class, 'destroy'])->name('buildings.destroy');
    // Create a new building
    Route::get('buildings/create', [BuildingsController::class, 'create'])->name('buildings.create');
    Route::post('buildings/store', [BuildingsController::class, 'store'])->name('buildings.store');
    // Manage cities and domains
    Route::resources([
        'cities' => CitiesController::class,
        'domains' => DomainsController::class,
        'users' => UsersController::class,
    ]);
});

// ----------------------super and normal admin routes ----------------------------
// These routes are accessible by users with the 'super admin' and 'normal admin' roles (role ID = 0)
Route::prefix('admin')->middleware(['auth', 'role:0,1'])->group(function () {
    // View all buildings
    Route::get('buildings', [BuildingsController::class, 'index'])->name('buildings.index');
    // Edit a specific building
    Route::get('buildings/{building}/edit', [BuildingsController::class, 'edit'])->name('buildings.edit');
    // Update a specific building
    Route::put('buildings/{building}', [BuildingsController::class, 'update'])->name('buildings.update');
});

// ----------------------normal admin routes ----------------------------
// These routes are only accessible by users with the 'normal admin' role (role ID = 0)

Route::prefix('admin')->middleware(['auth', 'role:0'])->group(function () {
    // Manage floors
    Route::resources([
        'floors' => FloorsController::class,
        'offices' => OfficesController::class,
        //'companies' => CompaniesController::class,
        //'employees' => EmployeesController::class,
        //'complaints' => ComplaintsController::class,
    ]);
});


// ----------------------public routes ----------------------------
// These routes are accessible to everyone
Route::get('/', [HomeController::class, 'index']);

// ----------------------auth routes ----------------------------
// These routes handle user authentication
Auth::routes(); 