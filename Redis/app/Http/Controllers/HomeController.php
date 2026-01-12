<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $products = Cache::remember('allProducts', 300, fn() => Products::latest()->take(9)->get());

        return view('welcome', [
            'products' => $products
        ]);
    }
}
