<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    const STATUS_PAID = "paid";
    const STATUS_UNPAID = "unpaid";
    const STATUS_CANCELED = "canceled";

    const ALLOWED_STATUSES = [
        self::STATUS_PAID,
        self::STATUS_UNPAID,
        self::STATUS_CANCELED
    ];

    protected $table = 'orders';

    protected $fillable = ['user_id','status', 'price' ];
}
