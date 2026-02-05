<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserOrderRequest;
use App\Models\BookModel;
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

        $allProducts = array_column(Session::get('order'), 'book_name');

        $products = BookModel::whereIn('name', $allProducts)->get();


        return view('cart', [
            'cart' => Session::get('order'),
            'products' => $products,
        ]);
    }
}
