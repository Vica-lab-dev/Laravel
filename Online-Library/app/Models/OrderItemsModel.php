<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemsModel extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['order_id', 'book_name', 'price'];
}
