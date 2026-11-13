<?php

use App\Http\Controllers\Api\CategoryController;
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
    Route::post("/providers/{provider}/restore", "restore")->name("restore");
    Route::delete("/providers/{provider}/forceDelete", "forceDelete")->name("forceDelete");
});

Route::middleware("auth:sanctum")->name("category.")->controller(CategoryController::class)->group(function () {
    Route::get("/categories", "index")->name("index");
    Route::get("/categories/{category}", "show")->name("show");
    Route::post("/categories", "store")->name("store");
    Route::patch("/categories/{category}", "update")->name("update");
    Route::delete("/categories/{category}", "destroy")->name("destroy");
    Route::post("/categories/{category}/restore", "restore")->name("restore");
    Route::delete("/categories/{category}/force-delete", "forceDelete")->name("forceDelete");
});
