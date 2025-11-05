<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;


Route::get("/about", function (){
    return view("about", [
        'ime' => 'Vica',
        'prezime' => 'Maletkovic'
    ]);
});
Route::get("/contact", [\App\Http\Controllers\ContactController::class, "index"]);

Route::get("/shop", [\App\Http\Controllers\ShopController::class, "index"]);

Route::get("/", [\App\Http\Controllers\HomepageController::class, "index"]);

Route::view("/navigation", "navigation");

Route::view("/footer", "footer");

Route::view("/layout", "layout");

Route::get("/admin/all-contacts", [\App\Http\Controllers\ContactController::class, "getAllContacts"]);
Route::post("/admin/add-products", [\App\Http\Controllers\ProductsController::class, "AddProducts"]);
Route::get("/admin/products", [\App\Http\Controllers\ProductsController::class, "getAllProducts"]);
Route::get("/admin/all-products", [\App\Http\Controllers\ProductsController::class, "index"]);
Route::get("/admin/delete-product/{product}", [\App\Http\Controllers\ProductsController::class, "delete"]);
Route::get("/admin/delete-contact/{contact}", [\App\Http\Controllers\ContactController::class, "delete"]);



Route::post("/send-contact", [\App\Http\Controllers\ContactController::class, "sendContact"]);

Route::view("/addProduct", "addProduct");











