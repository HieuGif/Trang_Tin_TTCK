<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "video";

    public function binhluanvideo()
    {
    	return $this->hasMany('App\BinhLuanVideo','idVideo','id')->where('KichHoat',0);
    }
     public function user()
    {
    	return $this->belongsTo('App\User','idUser','id')->where('KichHoat',1);
    }
    public function theloai()
    {
        return $this->belongsTo('App\TheLoai','idTheLoai','id'); 
    }
}
