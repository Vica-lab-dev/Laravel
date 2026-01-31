<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $bookRepo;

    public function __construct()
    {
        $this->bookRepo = new BookRepository();
    }

    public function create(BookRequest $request)
    {
        $this->bookRepo->createBook($request);

        return redirect()->back();
    }
}
