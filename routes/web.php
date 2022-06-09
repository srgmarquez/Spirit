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
Route::resource('order', OrderController::class);
Route::resource('shoping', ShopingcartController::class);
Route::delete('category/{id}',[CategoryController::class, 'destroy'])->name('categories.destroy');
Route::resource('category', CategoryController::class);
Route::resource('garment', GarmentController::class);
Route::resource('admin', AdminController::class);
Route::resource('/', HomeController::class);
Route::resource('user', UserController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/holla', function () {
    return view('admin/admin-index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
