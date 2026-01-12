<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/products', 'create_product');
Route::post('/products/create', [ProductsController::class, 'create']);
Route::get("/products/flush", [ProductsController::class, 'flush']);
