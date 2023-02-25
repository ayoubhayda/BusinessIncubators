<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DomainsController;
use App\Http\Controllers\HomeController;




//----------------------super admin routes ----------------------------

Route::prefix('admin')->middleware(['auth','role:1'])->group(function (){
    Route::resources([
        'buildings'=> BuildingsController::class,
        'cities'=> CitiesController::class,
        'domains'=> DomainsController::class,
    ]);
});



//----------------------normal admin routes ----------------------------

Route::prefix('admin')->middleware(['auth','role:0'])->group(function () {
    Route::resources([
        //
    ]);
});


//----------------------public routes ----------------------------

Route::get('/',[HomeController::class, 'index']);
Route::get('/admin',[HomeController::class, 'login']);

//----------------------auth routes ----------------------------

Auth::routes();



