<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    protected $table='rest';

    public function menu()
    {
    	return $this->hasOne('App\Mnu');
    }
    public function menu2()
    {
    	return $this->hasMany('App\Mnu');
    }
     public function comments()
    {
        return $this->hasMany('App\Comment2');
    }
     public function reviews()
    {
    	return $this->hasMany('App\Like');
    }
    
}
