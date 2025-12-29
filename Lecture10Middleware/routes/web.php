<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;



Route::get("/about", function () {
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

//Route::view("/editProduct", "products");

Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function() {

    Route::get("/all-contacts", [ContactController::class, "getAllContacts"])->name("allContacts");
    Route::post("/add-products/save", [ProductsController::class, "AddProducts"])->name("saveProducts");
    Route::get("/editProduct", [ProductsController::class, "getAllProducts"]);
    Route::get("/all-products", [ProductsController::class, "index"])->name("allProducts");
    Route::get("/delete-product/{product}", [ProductsController::class, "delete"])->name("deleteProduct");
    Route::get("/delete-contact/{contact}", [ContactController::class, "delete"])->name("deleteContact");
    Route::get("/product/edit/{product}", [ProductsController::class, "singleProduct"])->name("editProduct");
    Route::post("/updated-product/{product}", [ProductsController::class, "update"])->name("updateProduct");
    Route::get("/contact/edit/{contact}", [ContactController::class, "singleContact"])->name("editContact");
    Route::post("/updated-contact/{contact}", [ContactController::class, "update"])->name("updateContact");
    Route::view("/addProduct", "addProduct");
});





