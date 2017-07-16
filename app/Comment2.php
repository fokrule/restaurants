<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment2 extends Model
{
    public function rest()
    {
    	return $this->belongsTo('App\Rest');
    }
}
