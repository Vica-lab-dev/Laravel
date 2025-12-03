<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendModel extends Model
{
    protected $table = 'friend';

    protected $fillable = [
        'name',
        'email',
        'friends_id',
        'user_id',
    ];
}
