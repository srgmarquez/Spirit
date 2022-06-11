<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GarmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopingcartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Ruta par acceder a un método especifico */
Route::get('index-admin', function () {
    return view('admin/admin-index');
});

/* Rutas de todos los controladores, resource para indicar todos los métodos por defecto (index, store create...)*/
/* El middleware auth sirve para que si no están loggeados no puedan acceder a ese método  */
Route::resource('order', OrderController::class)->middleware('auth');
Route::resource('shoping', ShopingcartController::class)->middleware('auth');
Route::resource('category', CategoryController::class)->middleware('auth');
Route::resource('garment', GarmentController::class)->middleware('auth');
Route::resource('admin', AdminController::class);
Route::resource('/', HomeController::class);
Route::resource('user', UserController::class);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
