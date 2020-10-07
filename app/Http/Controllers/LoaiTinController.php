<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TinTuc;
use App\TheLoai;
use App\Http\Requests;
use App\Comment;
class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
    	$loaitin = LoaiTin::orderBy('updated_at','desc')->get();
		return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getThem()
    {
    	$theloai = TheLoai::all();
    	return view('admin.loaitin.them',['theloai'=>$theloai]);
    }

     public function postThem(Request $request)
    {

    	
    	$this->validate($request,
    		[
    			'Ten' =>'required|min:1|max:100|unique:LoaiTin,Ten',
    			'TheLoai'=>'required'
    		],
    		[

    			'Ten.required'=>'Bạn chưa nhập tên loại tin',
    			'Ten.unique'=>'Tên loại tin đã tồn tại',
    			'Ten.min'=>'Tên loại tin phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.max'=>'Tên loại tin phải có độ dài từ 3 đến 100 ký tự',
    			'TheLoai.required'=>'Bạn chưa chọn thể loại'

    		]
    	);
    	$loaitin = new LoaiTin;
    	$loaitin->Ten = $request->Ten;
    	$loaitin->TenKhongDau = changeTitle($request->Ten);
    	$loaitin->idTheloai =$request->TheLoai;
    	$loaitin->save();

    	return redirect('admin/loaitin/them')->with('thongbao','Thêm loại tin thành công');

    }

    public function getSua($id)
    {
    	$loaitin = LoaiTin::find($id);
    	$theloai = TheLoai::all();
    	return view('admin.loaitin.sua'
    		,['loaitin'=>$loaitin,'theloai'=>$theloai]);
    


    }
     public function postSua(Request $request,$id)
    {
		$loaitin = LoaiTin::find($id);
		
		
		$this->validate($request,
    		[
    			'Ten' =>'required|min:3|max:100|unique:LoaiTin,Ten,'.$id,
    			'TheLoai'=>'required'
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên loại tin',
    			'Ten.unique'=>'Tên loại tin đã tồn tại',
    			'Ten.min'=>'Tên loại tin phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.max'=>'Tên loại tin phải có độ dài từ 3 đến 100 ký tự',
    			'TheLoai.required'=>'Bạn chưa chọn thể loại'

    		]
    	);
    	
    	$loaitin->Ten = $request->Ten;
    	$loaitin->TenKhongDau= changeTitle($request->Ten);
		$loaitin->idTheloai =  $request->TheLoai;


		$loaitin->save();
    	return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Cập nhật loại tin thành công');

    	
    }
    public function getXoa($id)
    {
    	
        $kiemtratintuc=TinTuc::where('idLoaiTin',$id)->get();
   
        if(count($kiemtratintuc)==0 )
        {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect()->back()->with('thongbao','Xóa loại tin thành công');


         }
        else
        {
            return redirect()->back()->with('thongbaoloi','Không thể xóa vì tin tức đã được sử dụng');
        }
    }
}

