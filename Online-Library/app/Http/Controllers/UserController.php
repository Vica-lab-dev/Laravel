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
}
