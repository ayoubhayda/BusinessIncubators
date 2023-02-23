<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DomainsController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StaticController::class, 'login'])->name('login');
Route::resource('buildings', BuildingsController::class);
Route::get('/cities', [StaticController::class, 'cities'])->name('cities.index');
Route::get('/domains', [StaticController::class, 'domains'])->name('domains.index');
Route::get('/accounts', [StaticController::class, 'account'])->name('account.index');

Auth::routes();

Route::get('/home', [BuildingsController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('login');
});
Route::resources([
    '/buildings'=> BuildingsController::class,
    '/cities'=> CitiesController::class,
    '/domains'=> DomainsController::class,
    '/users'=> UsersController::class
]);

