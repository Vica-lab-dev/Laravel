<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use App\Models\WeatherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    public function AddData(Request $request)
    {
        $request->validate([
            'city' => "required|string||max:255|unique:forecast",
            'temperature' => "required|integer",
        ]);

        WeatherModel::create
        ([
            'city' => $request->get('city'),
            'temperature' => $request->get('temperature'),
        ]);

        return redirect()->back();
    }

    public function getAllData()
    {
        $allData = WeatherModel::all();
        return view('AllData', compact('allData'));
    }

    public function SingleData(Request $request, WeatherModel $data)
    {
        return view('EditData', compact('data'));
    }

    public function updateData(Request $request, WeatherModel $data)
    {
        $data -> city = $request->get('city');
        $data -> temperature = $request->get('temperature');

        $data -> save();

        return redirect()->route('AllData');
    }

    public function deleteData(WeatherModel $data)
    {
        $data -> delete();

        return redirect()->route('AllData');
    }

    public function getForecastData(CitiesModel $city)
    {
        return view('ForecastData', compact('city'));
    }

    public function search(Request $request)
    {
        $cityName = $request->get('city');

        Artisan::call("app:test-command", ['city' => $cityName]);

        $cities = CitiesModel::with('todaysForecast')
            ->where('name', 'LIKE', "%{$cityName}%")->get();

        if(count($cities) == 0)
        {
            return redirect()->back()->with('error', 'No cities found');
        }

        $userFavourites = [];
        if(Auth::check())
        {
            $userFavourites = Auth::user()->cityFavourites;
            $userFavourites = $userFavourites->pluck('city_id')->toArray();
        }

        return view('search_result', compact('cities', 'userFavourites'));
    }


}
