<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
       //$allProducts = [];

       // foreach (Session::get('product') as $cartItem)
       // {
       //     $allProducts[] = $cartItem['product_id'];
       // }
       // $products = ProductsModel::whereIn('id', $allProducts)->get();

        //$allProducts = array_column(Session::get('product'), 'product_id');
       // $products = ProductsModel::whereIn('id', $allProducts)->get();


       // return view('cart', [
       //     'cart' => Session::get('product'),
        //    'products' => $products,
        //]);


       $combined = [];
       foreach(Session::get('product') as $item)
       {
           $product = ProductsModel::firstWhere(['id' => $item['product_id']]);
           if($product)
           {
               $combined[] =
                   [
                       'name' => $product->name,
                       'amount' => $item['amount'],
                       'price' => $product->price,
                       'total' => $product->price * $item['amount']
                   ];
           }
       }

       return view('cart', [
               'combinedItems' => $combined,
           ]);

    }
    public function addToCart(CartAddRequest $request)
    {
        $product = ProductsModel::find($request->id);
        if($product && $product->amount < $request->amount)
        {
            return redirect()->back();
        }

        Session::push('product', [
            'product_id' => $request->id,
            'amount' => $request->amount,
        ]);


        return redirect()->route("cart.index");
    }


}
