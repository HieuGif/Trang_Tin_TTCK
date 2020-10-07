<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    public $table = "tintuc";

    public function theloai()
    {
        return $this->belongsTo('App\TheLoai','idTheLoai','id'); 
    }

    public function loaitin()
    {
    	return $this->belongsTo('App\LoaiTin','idLoaiTin','id'); 
    }
    public function binhluan()
    {
    	return $this->hasMany('App\BinhLuan','idBaiViet','id')->where('KichHoat',0);
    }
     public function user()
    {
    	return $this->belongsTo('App\User','idUser','id')->where('KichHoat',1);
    }
  
}