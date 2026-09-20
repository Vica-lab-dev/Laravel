<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name("auth.")->controller(AuthController::class)->group(function () {
    Route::post("auth/register", "register")->name("register");
    Route::post("auth/login", "login")->name("login");
});
