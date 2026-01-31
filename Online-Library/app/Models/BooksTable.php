<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BooksTable extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'name', 'author', 'description', 'price'
    ];
}
