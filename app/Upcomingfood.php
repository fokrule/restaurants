<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upcomingfood extends Model
{
	 protected $table='upcomingfoods';
    public function rest()
    {
    	return $this->belongsTo('App\Rest');
    }
}
