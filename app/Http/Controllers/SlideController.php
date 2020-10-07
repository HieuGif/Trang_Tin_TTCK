<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\Http\Requests;
use App\Comment;
use App\Slide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class SlideController extends Controller
{
    //


    public function getDanhSach()
    {
    	$slide = Slide::orderBy('created_at','desc')->get();;
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem()
    {
    	return view('admin.slide.them');

    }

     public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'Ten'=>'required',


    		],
    		[

    			'Ten.required'=>'Bạn chưa tên',


    		]
    	);
    	$slide = new Slide;
    	$slide->Ten = $request->Ten;
        $slide->idUser= Auth::user()->id;
    	$slide->HinhDang = $request->HinhDang;
    	if($request->has('Link'))
    		$slide->Link = $request->Link;

    	if($request->hasFile('Hinh'))
    	{
    		$file = $request->file('Hinh');
    		//kiem tra duoi hinh anh
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg')
    			{
    				return redirect('admin/slide/them')->with('thongbaoloi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');

    			}
    		$name= $file->getClientOriginalName();
    		//ramdom them 4 ki tu truoc ten hinh  _
    		$Hinh = str_random(4)."_". $name;
    		//kiem tra khong co ramdom trung lap
    		while (file_exists("public/upload/slide".$Hinh))
    		 {

    			$Hinh = str_random(4)."_". $name;
    		}
    		//luu hinh vao file tin tuc
    		$file->move("public/upload/slide",$Hinh);
            //xoa hinh cu trong file upload
             if($slide->Hinh){
            unlink("public/upload/slide/".$tintuc->Hinh);
                }
    		$slide->Hinh = $Hinh;
    	}
    	else
    	{
    		$slide->Hinh = "";
    	}

    $slide->save();

    return redirect('admin/slide/them')->with('thongbao','Thêm slide thành công');
	}





    public function getSua($id)
    {

    	$slide = Slide::find($id);
    	return view('admin.slide.sua',['slide'=>$slide]);

    }
     public function postSua(Request $request,$id)
    {

    	$this->validate($request,
    		[
    			'Ten'=>'required',
    		//	'NoiDung'=>'required',

    		],
    		[

    			'Ten.required'=>'Bạn chưa tên',
    		//	'NoiDung.required'=>'Bạn chưa nhập nội dung',

    		]
    	);
    	$slide = Slide::find($id);
    	$slide->Ten = $request->Ten;
        $slide->idUser= Auth::user()->id;
    	$slide->HinhDang = $request->HinhDang;
    	if($request->has('Link'))
    		$slide->Link = $request->Link;

    if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            //kiem tra duoi hinh anh
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' && $duoi!='gif')
                {
                    return redirect('admin/slide/sua/'.$id->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg,gif'));

                }
            $name= $file->getClientOriginalName();
            //ramdom them 4 ki tu truoc ten hinh  _
            $Hinh = str_random(4)."_". $name;
            //kiem tra khong co ramdom trung lap
            while (file_exists("public/upload/slide".$Hinh))
             {

                $Hinh = str_random(4)."_". $name;
            }

            //luu hinh vao file tin tuc

            $file->move("public/upload/slide",$Hinh);
            //xoa hinh cu
          //  unlink("upload/tintuc/".$tintuc->Hinh);
            /*if($tintuc->Hinh){
            unlink("upload/tintuc/".$tintuc->Hinh);
                }*/

            $slide->Hinh = $Hinh;
        }


    	$slide->save();

    return redirect('admin/slide/sua/'.$id)->with('thongbao','Cập nhật slide thành công');
}

    public function getXoa($id)
    {
    	$slide = Slide::find($id);
        File::delete('public/upload/slide/'.$slide->Hinh);
    	$slide->delete();
    	return \redirect()->back()->with('thongbao','Xóa slide thành công');
    }
}

