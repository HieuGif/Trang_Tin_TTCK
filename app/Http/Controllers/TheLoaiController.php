<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TheLoai;
use App\LoaiTin;
use App\User;
use App\Video;
use App\TinTuc;


class TheLoaiController extends Controller
{
    //


    public function getDanhSach()
    {

    	$theloai = TheLoai::orderBy('updated_at','desc')->get();
		return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getThem()
    {
    	return view('admin.theloai.them');
    }

     public function postThem(Request $request)
    {

    	$this->validate($request,
    		[
    			'Ten' =>'required|min:3|max:100|',
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên thể loại',
    			'Ten.unique'=>'Tên thể loại đã tồn tại',
    			'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',

    		]
    	);
    	$theloai = new TheLoai;
    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau = changeTitle($request->Ten);
    	$theloai->save();

    	return redirect('admin/theloai/them')->with('thongbao','Thêm thể loại thành công');

    }

    public function getSua($id)
    {

    	$theloai = TheLoai::find($id);
    	return view('admin.theloai.sua'
    		,['theloai'=>$theloai]);
    }
     public function postSua(Request $request,$id)
    {
    	$theloai = TheLoai::find($id);
    	$this->validate($request,
    		[
    			'Ten' =>'required|min:3|max:100|unique:TheLoai,Ten,'.$id,
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên thể loại',
    			'Ten.unique'=>'Tên thể loại đã tồn tại',
    			'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự'

    		]
    	);
    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau = changeTitle($request->Ten);
    	$theloai->save();
    	return redirect('admin/theloai/sua/'.$id)->with('thongbao','Cập nhật thể loại thành công');

    }
    public function getXoa($id)
    {

             $kiemtraloaitin=LoaiTin::where('idTheLoai',$id)->get();
             $kiemtravideo=Video::where('idTheLoai',$id)->get();

        if(count($kiemtraloaitin)==0 && count($kiemtravideo)==0)
        {
             $theloai = TheLoai::find($id);
            $theloai->delete();
            return \redirect()->back()->with('thongbao','Xóa thể loại thành công');


         }
        else
        {
            return redirect()->back()->with('thongbaoloi','Không thể xóa thể loại vì đang được sử dụng');
        }
    }
}
