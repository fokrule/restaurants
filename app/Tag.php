<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     public function menu()
    {
    	return $this->belongsToMany('App\Restaurant');
    }
}
