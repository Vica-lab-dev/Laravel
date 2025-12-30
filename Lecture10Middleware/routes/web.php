<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
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

    Route::controller(ProductsController::class)->group(function () {
        Route::post("/product/add/save", "AddProducts")->name("saveProducts");
        Route::get("/product/edit", "getAllProducts");
        Route::get("/product/all", "index")->name("allProducts");
        Route::get("/product/delete/{product}", "delete")->name("deleteProduct");
        Route::get("/product/edit/{product}", "singleProduct")->name("editProduct");
        Route::post("/product/updated-/{product}", "update")->name("updateProduct");
    });




        Route::controller(ContactController::class)->prefix("/contact")->group(function () {
            Route::get("/added", "sendContact")->name('contact.added');
            Route::get("/all", "getAllContacts")->name('allContacts');
            Route::get("/delete/{contact}", "delete")->name('deleteContact');
            Route::get("/edit/{contact}", "singleContact")->name('editContact');
            Route::post("/updated-/{contact}", "update")->name('updateContact');
        });

        Route::view("/addProduct", "addProduct");
    });






