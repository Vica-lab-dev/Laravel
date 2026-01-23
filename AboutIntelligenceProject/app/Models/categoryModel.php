<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    protected $table = 'categories';

    protected $fillable = ['category', 'percent'];
}
