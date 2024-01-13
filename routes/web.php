<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::post('/category-save', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('/product-create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product-save', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
});
