<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Http\Request;

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

    public function getForecastData($city)
    {
        $temperature =
            [
            'beograd' => [19,  24, 38, 47, 5],
            'kragujevac' => [23, 25, 26, 8, 7],
            'cacak' => [19, 18, 8, 4, 5],
            'subotica' => [8,6,4,7,5],
            'nis' => [5,7,3,6,8],
            'jagodina' => [28, 16, 37, 4, 7],
            ];

        $city = strtolower($city);

        if(!array_key_exists($city, $temperature))
        {
            die("City not exists!");
        }


        dd($temperature[$city]);
    }


}
