<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table='cat';

     public function catpost()
    {
    	return $this->hasMany('App\Mnu');
    } public function restpost()
    {
    	return $this->hasMany('App\Rest');
    }
}
