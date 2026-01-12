<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        //$products = [];
        //if(Cache::has('allProducts'))
       // {
       //     $products =Cache::get('allProducts');
        //}
        //else
        //{
         //   $products = Products::latest()->take(9)->get();
         //   Cache::put('allProducts', $products, 300);
        //}

        $products = Cache::remember('allProducts', 300, function()
        {
           return Products::latest()->take(9)->get();
        });

        return view('welcome', [
            'products' => $products
        ]);
    }
}
