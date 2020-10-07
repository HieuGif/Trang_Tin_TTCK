<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TheLoai;
use App\LoaiTin;
use App\User;
use App\LienHe;

class LienHeController extends Controller
{
    //


    public function getDanhSach()
    {

    	$lienhe = LienHe::orderBy('updated_at','desc')->get();
		return view('admin.lienhe.danhsach',['lienhe'=>$lienhe]);
    }
   
    public function getXoa($id)
    {

             $lienhe = LienHe::find($id);
            $lienhe->delete();
            return \redirect()->back()->with('thongbao','Xóa ý kiến thành công');


    }
}