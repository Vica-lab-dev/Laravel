<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informationModel extends Model
{
    protected $table = 'information';

    protected $fillable = ['user_id', 'name','email','country'];

    public function allInformation()
    {
        return $this->hasMany(categoryModel::class, 'information_id', 'id');
    }
}
