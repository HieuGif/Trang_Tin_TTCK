<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuanVideo extends Model
{
    protected $table = "binhluanvideo";

    public function video()
    {
    	return $this->belongsTo('App\Video','idVideo','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','idUser','id');
    }
}
