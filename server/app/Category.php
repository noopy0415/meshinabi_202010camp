<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function restaurans()
    {
        return $this->hasMany('App\Restaurant');
    }
}
