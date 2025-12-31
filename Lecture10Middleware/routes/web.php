<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCartController;
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
Route::get("/products/{product}", [ProductsController::class, "permalink"])->name("products.permalink");
Route::get("/", [HomepageController::class, "index"]);
Route::view("/navigation", "navigation");
Route::view("/footer", "footer");
Route::view("/layout", "layout");
Route::post("/cart/add", [ShoppingCartController::class, "addToCart"])->name('cart.add');
Route::get("/cart", [ShoppingCartController::class, "index"])->name('cart.index');

Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function() {

    Route::controller(ProductsController::class)->prefix("product")->name("product.")->group(function () {
        Route::post("/save", "AddProducts")->name("save");
        Route::get("/edit", "getAllProducts");
        Route::get("/all", "index")->name("all");
        Route::get("/delete/{product}", "delete")->name("delete");
        Route::get("/edit/{product}", "singleProduct")->name("edit");
        Route::post("/updated/{product}", "update")->name("update");
    });




        Route::controller(ContactController::class)->prefix("contact")->name("contact.")->group(function () {
            Route::post("/saved", "sendContact")->name('saved');
            Route::get("/all", "getAllContacts")->name('all');
            Route::get("/delete/{contact}", "delete")->name('delete');
            Route::get("/edit/{contact}", "singleContact")->name('edit');
            Route::post("/updated-/{contact}", "update")->name('update');
        });

        Route::view("/addProduct", "addProduct");
    });






