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

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/category/{id?}', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::post('/category-save', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/category-delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');
    Route::post('/category-update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('/product-create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product-save', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product-edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product-update', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/product-delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
});
