<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    use HasFactory;

    protected $table = 'shipments';

    protected $fillable = [
      'title', 'from_city', 'to_city',
      'from_country', 'to_country',
      'price', 'status', 'user_id',
      'details',
    ];
}
