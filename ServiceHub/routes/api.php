<?php

use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name("auth.")->controller(AuthController::class)->group(function () {
    Route::post("auth/register", "register")->name("register");
    Route::post("auth/login", "login")->name("login");
    Route::post("auth/logout", "logout")->middleware("auth:sanctum")->name("logout");
});

Route::middleware("auth:sanctum")->name("provider.")->controller(ProviderController::class)->group(function () {
    Route::get("/providers", "index")->name("index");
    Route::get("/providers/{provider}", "show")->name("show");
    Route::post("/providers", "store")->name("store");
    Route::patch("/providers/{provider}", "update")->name("update");
    Route::delete("/providers/{provider}", "destroy")->name("destroy");
});
