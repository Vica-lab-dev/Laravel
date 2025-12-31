<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index()
    {
        $products = ProductsModel::all();
        return view("shop", compact("products"));
    }
}
