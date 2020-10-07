<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = "binhluanbaiviet";

    public function tintuc()
    {
    	return $this->belongsTo('App\TinTuc','idBaiViet','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','idUser','id');
    }
}
