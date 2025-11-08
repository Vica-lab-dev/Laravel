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
