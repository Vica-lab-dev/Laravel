<?php

use App\Http\Controllers\OceneController;
use App\Models\Ocene;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ocene = Ocene::all();
    return view('welcome', compact('ocene'));
});

Route::view('/dodaj-ocenu', "addGrade");

Route::post("/add-user-grade", [OceneController::class, "addGrade"]);
