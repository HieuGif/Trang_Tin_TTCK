<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BinhLuanVideo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Video;
use App\User;
class BinhLuanVideoController extends Controller
{


  public function getDanhSach()
    {

        $user = User::all();
        $video = Video::all();
        $binhluanvideo = BinhLuanVideo::orderBy('updated_at','desc')->get();
        return view('admin.binhluanvideo.danhsach',['binhluanvideo'=>$binhluanvideo]);
    }


    public function getXoa($id)
    {
        $video = Video::all();
    	$binhluanvideo = BinhLuanVideo::find($id);
    	$binhluanvideo->delete();
    		return \redirect()->back()->with('thongbao','Xóa bình luận thành công');
    }

         public function postBinhLuanVideo($id,Request $request)
    {
        $idVideo = $id;
        $video = Video::find($id);
        $binhluanvideo = new BinhLuanVideo;
        $binhluanvideo->idVideo = $idVideo;
        $binhluanvideo->idUser= Auth::user()->id;
        $binhluanvideo->NoiDung = $request->NoiDung;
        $binhluanvideo->KichHoat = (isset($request->KichHoat))? 1 : 0;
        $binhluanvideo->save();
         return redirect("video/$id/".$video->TieuDeKhongDau.".html")->with('thongbao','Đăng bình luận thành công');
     }

      public  function getBinhLuanKichHoat($id)
    {
       $binhluanvideo = BinhLuanVideo::find($id);
        $binhluanvideo->KichHoat = 1 - $binhluanvideo->KichHoat;
        $binhluanvideo->save();

       return \redirect()->back()->with('thongbao','Thao tác xử lý thành công');

    }
}
