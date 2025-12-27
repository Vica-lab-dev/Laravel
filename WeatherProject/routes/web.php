<?php

use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCities;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $userFavourites = [];

    $user = \Illuminate\Support\Facades\Auth::user();

    if($user !== null)
    {
        $userFavourites = \App\Models\UserCities::where
        ([
            'user_id' => $user->id
        ])->get();
    }
    return view('welcome', compact('userFavourites'));

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

Route::middleware(AdminCheckMiddleware::class)->prefix("admin")->group(function () {
    Route::post('/AddForecastData', [ForecastController::class, 'AddData'])->name('SaveData');
    Route::get('/AllForecastData', [ForecastController::class, 'getAllData'])->name('AllData');

    Route::view("/AddData", 'AddData');

    Route::get("/editData/{data}", [ForecastController::class, 'singleData'])->name('SingleData');
    Route::post("/editData/update/{data}", [ForecastController::class, 'updateData'])->name('UpdateData');

    Route::get("/deleteData/{data}", [ForecastController::class, 'deleteData'])->name('deleteData');

    Route::view("/weather", 'admin.weather_index');

    Route::post('/weather/update', [AdminWeatherController::class, 'update'])->name('weather.update');

    Route::view('/forecasts', 'admin.forecastsCity');

    Route::post('/forecasts/update', [AdminWeatherController::class, 'forecastUpdate'])
        ->name('forecasts.update');

    Route::get('/forecasts/delete{city}', [UserCities::class, 'delete'])->name('forecasts.delete');

    Route::get('/forecasts/favourited/{city}', [ForecastController::class, 'data'])->name('forecasts.single');



});
    Route::get('/forecast/search', [ForecastController::class, 'search'])->name('forecast.search');

    Route::get('/forecast/city/{city:name}', [ForecastController::class, 'index'])->name('forecast.permalink');

    Route::get('/forecast/{city:name}',[ForecastController::class, 'getForecastData'])->name('ForecastData');

    /**
     * User cities
     */
    Route::get('/user-cities/favourite/{city}', [UserCities::class, 'favourite'])
        ->name('city.favourite');

