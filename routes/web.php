<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('main');
});

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/edit/product/{id}', [ProductController::class, 'edit']);
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/delete/product/{id}', [ProductController::class, 'delete']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
