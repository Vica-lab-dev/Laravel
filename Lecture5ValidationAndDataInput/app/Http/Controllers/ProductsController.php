<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getAllProducts()
    {
        $allProducts = ProductsModel::all();
        return view("products", compact("allProducts"));
    }

    public function AddProducts(Request $request)
    {
        $request->validate
        ([
            "name" => "required|string",
            "description" => "required|string",
            "amount" => "required|integer",
            "price" => "required|integer",
            "image" => "required|string",
        ]);

        ProductsModel::create
        ([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image"),
        ]);

        die("Adding successfully");


    }
}
