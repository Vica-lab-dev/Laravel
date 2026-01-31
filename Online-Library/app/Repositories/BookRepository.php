<?php

namespace App\Repositories;

use App\Models\BookModel;

class BookRepository
{
    private $bookModel;

    public function __construct()
    {
        return $this->bookModel = new BookModel();
    }

    public function createBook($request)
    {
        $this->bookModel->create([
            'name' => $request->name,
            'author' => $request->author,
            'description' => $request->description,
            'price' => $request->price,
        ]);
    }
}
