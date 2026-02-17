<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\UserOrderRequest;
use App\Models\BookModel;
use App\Models\OrderItemsModel;
use App\Models\OrderModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function book(BookModel $book)
    {
        return view('search', compact( 'book'));
    }

    public function search(Request $request)
    {
        $name = $request->get('search');
        $book = BookModel::where('name', 'LIKE', "%{$name}%")
            ->orWhere('author', 'LIKE', "%{$name}%")->first();
        return view('search', compact( 'book'));
    }

    public function sessionOrder(BookModel $book)
    {
        return view('sessionOrder', compact( 'book'));
    }

    public function order(UserOrderRequest $request)
    {

        Session::push('order', [
            'client_name' => $request->client_name,
            'book_name' => $request->book_name,
            'price' => $request->price,
        ]);

        return redirect()->route('user.cart');
    }

    public function cart()
    {

        $allOrders = Session::get("order", []);

        $allProducts = array_column($allOrders, 'book_name');

        $products = BookModel::whereIn('name', $allProducts)->get();

        $price = array_column($allOrders, 'price');
        $sumPrice = array_sum($price);

        return view('cart', [
            'cart' => $allOrders,
            'products' => $products,
            'count' => $sumPrice,
        ]);
    }

    public function cartForget($bookName)
    {
        $orders = Session::get("order", []);

        foreach ($orders as $order => $book)
        {
            if($book['book_name'] === $bookName)
                unset($orders[$order]);
        }
        Session::put('order', $orders);

        return redirect()->back();
    }

    public function cartFinish(Request $request)
    {
        $cart = Session::get('order', []);
        $totalPrice = array_column($cart, 'price');
        $sumPrice = array_sum($totalPrice);

        $order = OrderModel::create([
            'user_id' => Auth::id(),
            'price' => $sumPrice,
        ]);

        foreach($cart as $item)
        {
            OrderItemsModel::create([
                'order_id' => $order->id,
                'book_name' => $item['book_name'],
                'price' => $item['price'],
            ]);
        }

        return view('thankYou');

    }

}
