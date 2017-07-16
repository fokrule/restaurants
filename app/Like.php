<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $table='likes';
    public function rest()
    {
    	return $this->belongsTo('App\Rest');
    }
    public function menu_like()
    {
    	return $this->belongsTo('App\Mnu');
    }
}
