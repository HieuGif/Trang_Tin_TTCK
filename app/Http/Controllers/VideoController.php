<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\Http\Requests;
use App\BinhLuan;
use App\BinhLuanVideo;
use App\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

      public function getDanhSach()
    {
        if(Auth::user()->quyen == "1" || Auth::user()->quyen == "6" )
         {
            $video = Video::orderBy('created_at','desc')->get();
            return view('admin.video.danhsach',['video'=>$video]);
         }

       if(Auth::user()->quyen == "5")
       {

    	$video = Video::where('idUser', '=', Auth::id())->with('User')->orderBy('updated_at','desc')->get();
		return view('admin.video.danhsach',['video'=>$video]);
        }


    }
    public function getThem()
    {
    	$theloai = TheLoai::all();
    	return view('admin.video.them',['theloai'=>$theloai]);
    }
     public function postThem(Request $request)
    {

    	$this->validate($request,
    		[
    			'TheLoai'=>'required',

    			'TieuDe' =>'required|min:10|unique:TinTuc,TieuDe',
    			'NoiDung'=>'required',
                'Video'=>'required',

    		],
    		[
                'TheLoai.required'=>'Bạn chưa chọn thể loại',

    			'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
    			'TieuDe.min'=>'Tên tiêu đề phải có độ dài tối thiểu 10 kí tự!',
    			'TieuDe.unique'=>'Tiêu đề đã tồn tại',
    			'NoiDung.required'=>"Bạn chưa nhập nội dung",
                'Video.required'=>"Bạn chưa chọn file video",


    		]
    	);
    	$video = new Video;
        $video->idUser= Auth::user()->id;
    	$video->TieuDe = $request->TieuDe;
    	$video->TieuDeKhongDau = changeTitle($request->TieuDe);

        $video->idTheLoai = $request->TheLoai;
    	$video->NoiDung = $request->NoiDung;

        $video->NoiBat  = (isset($request->NoiBat))? 1 : 0;
        if(Auth::user()->quyen == "1")
		$video->KichHoat = 1;
		else 
        $video->KichHoat = (isset($request->KichHoat))? 1 : 0;
        $video->SoluotXem = 0;

    	if($request->hasFile('Video'))
    	{
    		$file = $request->file('Video');
    		//kiem tra duoi hinh anh
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'mp4' && $duoi !='webm' && $duoi !='ogg' && $duoi!='m4v' && $duoi!='mkv' )
    			{
    				return redirect('admin/video/them')->with('thongbaoloi','Video chỉ được chọn file có đuôi mp4,webm,ogg,m4v,mkv');

    			}
    		$name= $file->getClientOriginalName();
    		//ramdom them 4 ki tu truoc ten hinh  _
    		$Video = str_random(4)."_". $name;
    		//kiem tra khong co ramdom trung lap
    		while (file_exists("public/upload/video".$Video))
    		 {

    			$Video = str_random(4)."_". $name;
    		}
    		//luu hinh vao file tin tuc
    		$file->move("public/upload/video",$Video);
    		$video->Video = $Video;
    	}
    	else
    	{
    		$video->Video = "";
        }
//them hinh
       if($request->hasFile('Hinh'))
    	{
    		$file = $request->file('Hinh');
    		//kiem tra duoi hinh anh
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' && $duoi!='gif')
    			{
    				return redirect('admin/video/them')->with('thongbaoloi','Hình đại diện được chọn file có đuôi jpg,png,jpeg,gif');

    			}
    		$name= $file->getClientOriginalName();
    		//ramdom them 4 ki tu truoc ten hinh  _
    		$Hinh = str_random(4)."_". $name;
    		//kiem tra khong co ramdom trung lap
    		while (file_exists("public/upload/hinhvideo".$Hinh))
    		 {

    			$Hinh = str_random(4)."_". $name;
    		}
    		//luu hinh vao file tin tuc
    		$file->move("public/upload/hinhvideo",$Hinh);
    		$video->Hinh = $Hinh;
    	}
    	else
    	{
    		$video->Hinh = "";
        }
        
    $video->save();

    return redirect('admin/video/danhsach')->with('thongbao','Thêm video thành công');
	}

    public function getSua($id)
    {
        //$tintuc->idUser= Auth::user()->id;
    	$theloai = TheLoai::all();
    	$video = Video::find($id);


    	return view('admin.video.sua',['video'=>$video,'theloai'=>$theloai]);

    }
     public function postSua(Request $request,$id)
    {
    	$video = Video::find($id);

    	$this->validate($request,
    		[
                'TheLoai'=>'required',

    			'TieuDe' =>'required|min:10|unique:TinTuc,TieuDe,'.$id,
    			'NoiDung'=>'required',


    		],
    		[
                'TheLoai.required'=>'Bạn chưa chọn thể loại',
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
                'TieuDe.min'=>'Tên tiêu đề phải có độ dài tối thiểu 10 kí tự!',
                'TieuDe.unique'=>'Tiêu đề đã tồn tại',
                'NoiDung.required'=>"Bạn chưa nhập nội dung",
                'Video.required'=>"Bạn chưa chọn file video",



    		]
    	);
    	$video->TieuDe = $request->TieuDe;
     //   $tintuc->name= Auth::user()->id;
    	$video->TieuDeKhongDau = changeTitle($request->TieuDe);
        $video->idTheLoai = $request->TheLoai;
    	$video->NoiDung = $request->NoiDung;
        //giu lai gia tri ban dau
        if(Auth::user()->quyen == "1")
		$video->KichHoat = 1;
		else 
         $video->KichHoat = (isset($request->KichHoat))? 1 : 0;

	    if($request->hasFile('Video'))
        {
            $file = $request->file('Video');
            //kiem tra duoi hinh anh
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'mp4' && $duoi !='webm' && $duoi !='ogg' && $duoi!='m4v'&& $duoi!='mkv')
                {
                    return redirect('admin/video/sua/'.$id)->with('thongbaoloi','Video chỉ được chọn file có đuôi mp4,webm,ogg,m4v,mkv');
                    
                    while (file_exists("public/upload/video".$Hinh))
                    {
                    $video->Hinh=$Hinh;
                    }
                }
            $name= $file->getClientOriginalName();
            //ramdom them 4 ki tu truoc ten hinh  _
            $Video = str_random(4)."_". $name;
            //kiem tra khong co ramdom trung lap
            while (file_exists("public/upload/video".$Video))
             {

                $Video = str_random(4)."_". $name;
            }
                $Video_path =public_path('"public/upload/video/'. $video->Video);


            //luu  vao file tin tuc

            $file->move("public/upload/video",$Video);

            unlink("public/upload/video/".$video->Video);

            $video->Video= $Video;

        }

        //them hinh

        if($request->hasFile('Hinh'))
    	{

    		$file = $request->file('Hinh');
    		//kiem tra duoi hinh anh
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' && $duoi!='gif')
    			{
                    return redirect('admin/video/sua/'.$id)->with('thongbaoloi','Hình đại diện chỉ được chọn file có đuôi jpg,png,jpeg,gif');

                    while (file_exists("public/upload/hinhvideo".$Hinh))
    		            {
                        $video->Hinh=$Hinh;
    		            }

                }

    		$name= $file->getClientOriginalName();
    		//ramdom them 4 ki tu truoc ten hinh  _
    		$Hinh = str_random(4)."_". $name;
    		//kiem tra khong co ramdom trung lap
    		while (file_exists("public/upload/hinhvideo".$Hinh))
    		 {

    			$Hinh = str_random(4)."_". $name;
    		}


    		//luu hinh vao file tin tuc

            $file->move("public/upload/hinhvideo",$Hinh);
            unlink("public/upload/hinhvideo/".$video->Hinh);

            $video->Hinh=$Hinh;
    		//xoa hinh cu
          //  unlink("upload/tintuc/".$tintuc->Hinh);
            /*if($tintuc->Hinh){
            unlink("upload/tintuc/".$tintuc->Hinh);
                }*/
    	}

	    $video->save();

 		return redirect('admin/video/sua/'.$id)->with('thongbao','Cập nhật video thành công');
	}

    public function getXoa($id)
    {

           $kiemtracomment=BinhLuanVideo::where('idVideo',$id)->get();

        if(count($kiemtracomment)==0 )
        {
             $video = Video::find($id);
          File::delete('public/upload/video/'.$video->Video);
          File::delete('public/upload/hinhvideo/'.$video->Hinh);
            $video->delete($id);
            return redirect()->back()->with('thongbao','Xóa video thành công');


         }
        else
        {
            return redirect()->back()->with('thongbaoloi','Không thể xóa video vì đang được sử dụng');
        }
    }




   /* public function getKichHoat($id, $flag)
    {
       DB::table('tintuc')->where('ID', $id)->update([
            'KichHoat' => $flag
        ]);
        return redirect('admin/baiviet/danhsach');
    }*/


    public function getVideoKichHoat($id)
    {
        if(Auth::user()->quyen == "1" || Auth::user()->quyen == "6")
        {
        $video = Video::find($id);
        $video->KichHoat = 1 - $video->KichHoat;
        $video->save();

       return redirect()->back()->with('thongbao','Thao tác xử lý thành công');
   }
    }
   public  function getVideoNoiBat($id)
    {
        if(Auth::user()->quyen == "1" || Auth::user()->quyen == "6")
        {
       $video = Video::find($id);
        $video->NoiBat = 1 - $video->NoiBat;
        $video->save();

       return redirect()->back()->with('thongbao','Thao tác xử lý thành công');
        }

    }
}
