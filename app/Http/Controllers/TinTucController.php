<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\Http\Requests;
use App\TinTuc;
use App\BinhLuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TinTucController extends Controller
{


      public function getDanhSach()
    {
        if(Auth::user()->quyen == "1" || Auth::user()->quyen == "3" )
         {
            $tintuc = TinTuc::orderBy('created_at','desc')->get();
            return view('admin.baiviet.danhsach',['tintuc'=>$tintuc]);
         }

       if(Auth::user()->quyen == "5" )
       {

    	$tintuc = TinTuc::where('idUser', '=', Auth::id())->with('User')->orderBy('updated_at','desc')->get();
		return view('admin.baiviet.danhsach',['tintuc'=>$tintuc]);
        }


    }
    public function getThem()
    {
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	return view('admin.baiviet.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
     public function postThem(Request $request)
    {

    	$this->validate($request,
    		[
    			'TheLoai'=>'required',
                'LoaiTin'=>'required',
    			'TieuDe' =>'required|min:10|max:255|unique:TinTuc,TieuDe',
    			'TomTat'=>'required|max:255',
                'NoiDung'=>'required',
                'Hinh'=>'required',

    		],
    		[
                'TheLoai.required'=>'Bạn chưa chọn thể loại',
    			'LoaiTin.required'=>'Bạn chưa chọn loại tin',
    			'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
				'TieuDe.min'=>'Tên tiêu đề phải có độ dài tối thiểu 10 kí tự!',
				'TieuDe.max'=>'Tên tiêu đề phải có độ dài tối đa 255 kí tự!',
    			'TieuDe.unique'=>'Tiêu đề đã tồn tại',
				'TomTat.required'=>'Bạn chưa nhập tóm tắt',
				'TomTat.max'=>'Tóm tắt phải có độ dài tối đa 255 kí tự!',
                'NoiDung.required'=>"Bạn chưa nhập nội dung",
                'Hinh.required'=>"Bạn chưa chọn hình đại diện",


    		]
    	);
    	$tintuc = new TinTuc;
        $tintuc->idUser= Auth::user()->id;
    	$tintuc->TieuDe = $request->TieuDe;
    	$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    	$tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->idTheLoai = $request->TheLoai;

    	$tintuc->TomTat = $request->TomTat;
    	$tintuc->NoiDung = $request->NoiDung;
		$tintuc->NoiBat  = (isset($request->NoiBat))? 1 : 0;

		if(Auth::user()->quyen == "1")
		$tintuc->KichHoat = 1;
		else 
        $tintuc->KichHoat = (isset($request->KichHoat))? 1 : 0;
        $tintuc->SoluotXem = 0;


    	if($request->hasFile('Hinh'))
    	{
    		$file = $request->file('Hinh');
    		//kiem tra duoi hinh anh
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' && $duoi!='gif')
    			{
    				return redirect('admin/tintuc/them')->with('thongbaoloi','Hình đại diện chỉ được chọn file có đuôi jpg,png,jpeg,gif');

    			}
    		$name= $file->getClientOriginalName();
    		//ramdom them 4 ki tu truoc ten hinh  _
    		$Hinh = str_random(4)."_". $name;
    		//kiem tra khong co ramdom trung lap
    		while (file_exists("public/upload/tintuc".$Hinh))
    		 {

    			$Hinh = str_random(4)."_". $name;
    		}
    		//luu hinh vao file tin tuc
    		$file->move("public/upload/tintuc",$Hinh);
    		$tintuc->Hinh = $Hinh;
    	}
    	else
    	{
    		$tintuc->Hinh = "";
    	}
    $tintuc->save();

	return redirect('admin/tintuc/danhsach')->with('thongbao','Thêm tin tức thành công');
	/*return redirect('admin/tintuc/danhsach')->with('thongbao','Thêm tin tức thành công');*/
	}

    public function getSua($id)
    {
        //$tintuc->idUser= Auth::user()->id;
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	$tintuc = TinTuc::find($id);
        $layLoaiTinCuaTinTuc = LoaiTin::find($tintuc->idLoaiTin);
        $layTheLoaiCuaLoaiTin = strval($layLoaiTinCuaTinTuc->idTheLoai);
        $tatCaLoaiTinThuocTheLoai = LoaiTin::where('idTheLoai','=',$layTheLoaiCuaLoaiTin)->get();
    	return view('admin.baiviet.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);

    }
     public function postSua(Request $request,$id)
    {
    	$tintuc = TinTuc::find($id);

    	$this->validate($request,
    		[
    			'LoaiTin'=>'required',
    			'TieuDe' =>'required|min:10|unique:TinTuc,TieuDe,'.$id,
    			'TomTat'=>'required',
    			'NoiDung'=>'required',

    		],
    		[

    			'LoaiTin.required'=>'Bạn chưa chọn loại tin',
    			'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
    			'Ten.unique'=>'Tên thể loại đã tồn tại',
    			'TieuDe.min'=>'Tên thể loại phải có độ dài từ 10 kí tự trở lên',
    			//'TieuDe.unique'=>'Tiêu đề đã tồn tại',
    			'TomTat.required'=>'Bạn chưa nhập tóm tắt',
    			'NoiDung.required'=>"Bạn chưa nhập nội dung",


    		]
    	);
    	$tintuc->TieuDe = $request->TieuDe;
     //   $tintuc->name= Auth::user()->id;
		$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
		$tintuc->idTheLoai = $request->TheLoai;
    	$tintuc->idLoaiTin = $request->LoaiTin;
    	$tintuc->TomTat = $request->TomTat;
    	$tintuc->NoiDung = $request->NoiDung;
        //giu lai gia tri ban dau
		if(Auth::user()->quyen == "1")
		$tintuc->KichHoat = 1;
		else 
        //giu lai gia tri ban dau
         $tintuc->KichHoat = (isset($request->KichHoat))? 1 : 0;

    	if($request->hasFile('Hinh'))
    	{

    		$file = $request->file('Hinh');
    		//kiem tra duoi hinh anh
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' && $duoi!='gif')
    			{
                    return redirect('admin/tintuc/sua/'.$id)->with('thongbaoloi','Hình đại diện chỉ được chọn file có đuôi jpg,png,jpeg,gif');

                    while (file_exists("public/upload/tintuc".$Hinh))
    		            {
                        $tintuc->Hinh=$Hinh;
    		            }
                }
    		$name= $file->getClientOriginalName();
    		//ramdom them 4 ki tu truoc ten hinh  _
    		$Hinh = str_random(4)."_". $name;
    		//kiem tra khong co ramdom trung lap
    		while (file_exists("public/upload/tintuc".$Hinh))
    		 {

    			$Hinh = str_random(4)."_". $name;
    		}


    		//luu hinh vao file tin tuc

			$file->move("public/upload/tintuc",$Hinh);
			unlink("public/upload/tintuc/".$tintuc->Hinh);
			$tintuc->Hinh=$Hinh;
			
    		//xoa hinh cu
          //  unlink("upload/tintuc/".$tintuc->Hinh);
            /*if($tintuc->Hinh){
            unlink("upload/tintuc/".$tintuc->Hinh);
                }*/
    	}

	    $tintuc->save();

		 return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Cập nhật tin tức thành công');
		 /*return redirect('admin/tintuc/danhsach')->with('thongbao','Cập nhật tin tức thành công');*/
	}

    public function getXoa($id)
    {

        $kiemtracomment=BinhLuan::where('idBaiViet',$id)->get();

        if(count($kiemtracomment)==0 )
        {
             $tintuc = TinTuc::find($id);
          File::delete('public/upload/tintuc/'.$tintuc->Hinh);
            $tintuc->delete($id);

            return redirect()->back()->with('thongbao','Xóa tin tức thành công');

         }
        else
        {
            return redirect()->back()->with('thongbaoloi','Không thể xóa vì tin tức đã được sử dụng');
        }

    }



   /* public function getKichHoat($id, $flag)
    {
       DB::table('tintuc')->where('ID', $id)->update([
            'KichHoat' => $flag
        ]);
        return redirect('admin/TinTuc/danhsach');
    }*/


    public function getTinTucKichHoat($id)
    {
        if(Auth::user()->quyen == "1" || Auth::user()->quyen == "3")
        {
        $tintuc = TinTuc::find($id);
        $tintuc->KichHoat = 1 - $tintuc->KichHoat;
        $tintuc->save();

       return redirect()->back()->with('thongbao','Thao tác xử lý thành công');
   }
    }
   public  function getTinTucNoiBat($id)
    {
        if(Auth::user()->quyen == "1" || Auth::user()->quyen == "3")
        {
       $tintuc = TinTuc::find($id);
        $tintuc->NoiBat = 1 - $tintuc->NoiBat;
        $tintuc->save();

       return redirect()->back()->with('thongbao','Thao tác xử lý thành công');
        }

    }
}
