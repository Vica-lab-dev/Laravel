<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informationModel extends Model
{
    protected $table = 'information';

    protected $fillable = ['user_id', 'name','email','country'];
}
