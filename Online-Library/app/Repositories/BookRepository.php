<?php

namespace App\Repositories;

use App\Models\BookModel;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BookRepository
{
    private $bookModel;

    public function __construct()
    {
        return $this->bookModel = new BookModel();
    }

    public function createBook($request)
    {
        $name = uniqid().".webp";
        $file = $request->file('image');
        $gd = new Driver();
        $manager = new ImageManager($gd);
        $image = $manager->read($file)->toWebp(80);
        Storage::disk('public')->put("images/books/$name", (string) $image);

        $this->bookModel->create([
            'name' => $request->name,
            'author' => $request->author,
            'description' => $request->description,
            'content' => $request->content,
            'price' => $request->price,
            'image' => $name,
        ]);
    }
}
