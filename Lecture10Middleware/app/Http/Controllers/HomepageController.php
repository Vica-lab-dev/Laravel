<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;

class HomepageController extends Controller
{
    public function index()
    {
        $hour = date("H");
        // dd($hour) = dump & die
        $currentTime = date("H:i:s");

        $products = ProductsModel::orderByDesc("id")
            ->take(6)
            ->get();

        return view("welcome", compact("currentTime", "hour", "products"));
    }


}
