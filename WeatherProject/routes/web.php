<?php

use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->prefix("admin")->group(function () {
    Route::post('/AddForecastData', [ForecastController::class, 'AddData'])->name('SaveData');
    Route::get('/AllForecastData', [ForecastController::class, 'getAllData'])->name('AllData');

    Route::view("/AddData", 'AddData');

    Route::get("/editData/{data}", [ForecastController::class, 'singleData'])->name('SingleData');
    Route::post("/editData/update/{data}", [ForecastController::class, 'updateData'])->name('UpdateData');

    Route::get("/deleteData/{data}", [ForecastController::class, 'deleteData'])->name('deleteData');

    Route::view("/weather", 'admin.weather_index');

    Route::post('/weather/update', [\App\Http\Controllers\AdminWeatherController::class, 'update'])->name('weather.update');
});

    Route::get('/forecast/{city:name}',[ForecastController::class, 'getForecastData'])->name('ForecastData');

