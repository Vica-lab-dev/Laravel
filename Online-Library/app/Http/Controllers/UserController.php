<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request, BookModel $book)
    {
        $name = $request->get('search');
        $foundBook = BookModel::where('name', 'LIKE', "%{$name}%")
            ->orWhere('author', 'LIKE', "%{$name}%")->first();
        return view('search', compact('foundBook', 'book'));

    }
}
