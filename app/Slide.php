<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slide";

   public function user()
    {
    	return $this->belongsTo('App\User','idUser','id')->where('KichHoat',1);
    }
}