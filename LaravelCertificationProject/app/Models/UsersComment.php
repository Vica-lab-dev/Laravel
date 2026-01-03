<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersComment extends Model
{
    protected $table = 'users_comments';
    protected $fillable = ['user_id', 'comment'];
}
