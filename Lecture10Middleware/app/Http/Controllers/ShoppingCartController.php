<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $cart = Session::get('product');
        if(count($cart) < 0)
        {
            return redirect('/');
        }

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

    public function finishOrder()
    {
        $cart = Session::get('product');
        $totalCartPrice = 0;

        foreach($cart as $item)
        {
            $product = ProductsModel::firstWhere(['id' => $item['product_id']]);
            $totalCartPrice += $product->price * $item['amount'];
            if($item['amount'] > $product->amount )
            {
                return redirect()->back();
            }
        }

        $order = Orders::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice,
        ]);

        foreach($cart as $item)
        {
            $product = ProductsModel::firstWhere(['id' => $item['product_id']]);
            $product->amount -= $item['amount'];
            $product->save();

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $item['amount'] * $product->price,
            ]);

        }

        Session::remove('product');

        return view('ThankYou');
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
