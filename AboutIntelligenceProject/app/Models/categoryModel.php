<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    protected $table = 'category';

    protected $fillable = ['category', 'percent'];
}
