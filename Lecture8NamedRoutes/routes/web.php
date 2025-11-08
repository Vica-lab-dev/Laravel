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

Route::view("/editProduct", "products");

Route::get("/admin/all-contacts", [ContactController::class, "getAllContacts"])->name("allContacts");
Route::post("/admin/add-products/save", [ProductsController::class, "AddProducts"]) ->name("saveProducts");
Route::get("/admin/products", [ProductsController::class, "getAllProducts"]);
Route::get("/admin/all-products", [ProductsController::class, "index"]) ->name("allProducts");
Route::get("/admin/delete-product/{product}", [ProductsController::class, "delete"]) ->name("deleteProduct");
Route::get("/admin/delete-contact/{contact}", [ContactController::class, "delete"]) ->name("deleteContact");
Route::get("/admin/product/edit/{id}", [ProductsController::class, "singleProduct"]) ->name("editProduct");
Route::post("/admin/updated-product/{id}", [ProductsController::class, "update"]) ->name("updateProduct");
Route::get("/admin/contact/edit/{id}", [ContactController::class, "singleContact"]) ->name("editContact");
Route::post("/admin/updated-contact/{id}", [ContactController::class, "update"]) ->name("updateContact");




Route::view("/addProduct", "addProduct");











