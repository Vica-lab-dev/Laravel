<?php

namespace App\Http\Controllers;

use App\Models\ForecastsModel;
use App\Models\WeatherModel;
use Illuminate\Http\Request;

class AdminWeatherController extends Controller
{
    public function update(Request $request)
    {
       $request->validate
       ([
           'temperature' => 'required',
           'city_id' => 'required|exists:cities,id',
       ]);

       $weather = WeatherModel::with('city')->where(['city_id' => $request->get('city_id')])->first();
       $weather->temperature = $request->get('temperature');
       $weather->save();

       return redirect()->back();
    }

    public function forecastUpdate(Request $request)
    {
        $request->validate
        ([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required',
            'weather_type' => 'required',
            'probability' => 'numeric|nullable',
            'forecast_date' => 'required',
        ]);

        ForecastsModel::create
        ([
            'city_id' => $request->get('city_id'),
            'temperature' => $request->get('temperature'),
            'weather_type' => $request->get('weather_type'),
            'probability' => $request->get('probability'),
            'forecast_date' => $request->get('forecast_date'),
        ]);


        return redirect()->back();
    }
}
