<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Illuminate\Support\php_binary;

class UsersComment extends Model
{
    protected $table = 'users_comments';
    protected $fillable = ['user_id', 'comment'];

    public function userComment()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
