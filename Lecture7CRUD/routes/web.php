<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::get("/about", function (){
    return view("about", [
        'ime' => 'Vica',
        'prezime' => 'Maletkovic'
    ]);
});
Route::get("/contact", [ContactController::class, "index"]);

Route::get("/shop", [ShopController::class, "index"]);

Route::get("/", [HomepageController::class, "index"]);

Route::view("/navigation", "navigation");

Route::view("/footer", "footer");

Route::view("/layout", "layout");

Route::get("/admin/all-contacts", [ContactController::class, "getAllContacts"]);
Route::post("/admin/add-products", [ProductsController::class, "AddProducts"]);
Route::get("/admin/products", [ProductsController::class, "getAllProducts"]);
Route::get("/admin/all-products", [ProductsController::class, "index"]);
Route::get("/admin/delete-product/{product}", [ProductsController::class, "delete"]);
Route::get("/admin/delete-contact/{contact}", [ContactController::class, "delete"]);



Route::post("/send-contact", [\App\Http\Controllers\ContactController::class, "sendContact"]);

Route::view("/addProduct", "addProduct");











