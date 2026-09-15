<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name("auth.")->controller(controller: "App\Http\Controllers\AuthController")->group(function () {
    Route::post(uri: "auth/register", action: "register")->name(name: "register");
});
