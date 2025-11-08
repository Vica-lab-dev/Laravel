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
            "name" => "required|string|unique:products",
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

        return redirect()->route("allProducts");


    }

    public function index()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }

    public function delete($product)
    {
        $singleProduct = ProductsModel::where(['id' => $product])->first();

        if ($singleProduct === null)
        {
            die("Product not found");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function singleProduct(Request $request, $id)
    {
        $product = ProductsModel::where(['id' => $id])->first();

        if($product === null)
        {
            die("Product not found");
        }

        return view("products/editProduct", compact("product"));

    }

    public function update(Request $request, $id)
    {

        $product = ProductsModel::where("id", $id)->first();

        if($product === null)
        {
            die("Product not found");
        }

        $product->name = $request->get("name");
        $product->description = $request->get("description");
        $product->amount = $request->get("amount");
        $product->price = $request->get("price");

        $product->save();

        return redirect()->route("allProducts");

    }
}
