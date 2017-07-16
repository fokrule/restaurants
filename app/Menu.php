<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
 	protected $table='menu';
 	  public function restaurant()
    {
    	return $this->belongsTo('App\Restaurant');
    }
   
}
