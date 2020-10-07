<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BinhLuan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\TinTuc;
use App\Video;
use App\User;
class BinhLuanController extends Controller
{


  public function getDanhSach()
    {

        $tintuc = TinTuc::all();
        $user = User::all();

        $binhluan = BinhLuan::orderBy('updated_at','desc')->get();
        return view('admin.binhluan.danhsach',['binhluan'=>$binhluan]);
    }


    public function getXoa($id)
    {
        $tintuc = TinTuc::all();
        $video = Video::all();
    	$binhluan = BinhLuan::find($id);
    	$binhluan->delete();
    		return \redirect()->back()->with('thongbao','Xóa bình luận thành công');
    }

    public function postBinhLuan($id,Request $request)
    {
        if(Auth::user())
        {
        $idBaiViet = $id;

    	$tintuc = TinTuc::find($id);
    	$binhluan = new BinhLuan;
    	$binhluan->idBaiViet = $idBaiViet;
    	$binhluan->idUser= Auth::user()->id;
    	$binhluan->NoiDung = $request->NoiDung;
        $binhluan->KichHoat = (isset($request->KichHoat))? 1 : 0;
        $binhluan->save();
         return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html")->with('thongbao','Đăng bình luận thành công');
        }
         else
         {
            return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html")->back()->with('thongbaoloi','Bạn cần đăng nhập tài khoản để bình luận');}
     }

      public  function getBinhLuanKichHoat($id)
    {
       $binhluan = BinhLuan::find($id);
        $binhluan->KichHoat = 1 - $binhluan->KichHoat;
        $binhluan->save();

       return redirect()->back()->with('thongbao','Thao tác xử lý thành công');

    }
}
