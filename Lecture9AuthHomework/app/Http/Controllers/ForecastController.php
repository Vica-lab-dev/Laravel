<?php

namespace App\Http\Controllers;

use App\Models\ForecastModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function AddData(Request $request)
    {
        $request->validate([
            'city' => "required|string||max:255|unique:forecast",
            'temperature' => "required|integer",
        ]);

        ForecastModel::create
        ([
            'city' => $request->get('city'),
            'temperature' => $request->get('temperature'),
        ]);

        return redirect()->back();
    }

    public function getAllData()
    {
        $allData = ForecastModel::all();
        return view('AllData', compact('allData'));
    }

    public function SingleData(Request $request, ForecastModel $data)
    {
        return view('EditData', compact('data'));
    }

    public function updateData(Request $request, ForecastModel $data)
    {
        $data -> city = $request->get('city');
        $data -> temperature = $request->get('temperature');

        $data -> save();

        return redirect()->route('AllData');
    }

    public function deleteData(ForecastModel $data)
    {
        $data -> delete();

        return redirect()->route('AllData');
    }


}
