<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\User;
use App\TinTuc;
use App\Slide;
use App\BinhLuan;
use App\BinhLuanVideo;
use App\Video;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;

class IndexController extends Controller
{



       public function trangchu()
    {
        $tintuc = TinTuc::orderBy('created_at','desc')->where('KichHoat',1)->where('NoiBat',1)->get()->toArray();
        $tintuc1 = array_slice($tintuc,0,1);
        $tintuc2 = array_slice($tintuc,1,1);
        $tintuc3 = array_slice($tintuc,2,2);

        $trend= TinTuc::orderBy('created_at','desc')->where('KichHoat',1)->where('NoiBat',1)->take(3)->get();

        $tintuctop = TinTuc::orderBy('created_at','desc')->where('SoLuotXem','desc')->where('KichHoat',1)->get()->random(3);


        $tintucphobien = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->get()->random(10);



        $tagvideo = Video::orderBy('created_at','desc')->where('KichHoat',1)->where('NoiBat',1)->take(6)->get();

        $tintucmoinhat=TinTuc::orderBy('created_at','desc')->where('KichHoat',1)->take(8)->get();



        $video1 = Video::orderBy('created_at','desc')->where('KichHoat',1)->take(2)->get();


        $slide = Slide::orderBy('created_at','desc')->where('HinhDang','0')->get()->toArray();
        $slide1 = array_slice($slide,0,1);
        $slide2 = Slide::orderBy('created_at','desc')->where('HinhDang','1')->get();








       return view('home.trangchu',
       [
        'tintuc1' => $tintuc1,
        'tintuc2' => $tintuc2,
        'tintuc3' => $tintuc3,
        'tintuctop' =>$tintuctop,
        'tintucphobien' =>$tintucphobien,
        'tintucmoinhat'=>$tintucmoinhat,
        'tagvideo'=>$tagvideo,
        'trend' => $trend,
        'video1'=>$video1,
        'slide1'=>$slide1,
        'slide2'=>$slide2,


       ]);
}

     public function lienhe()
    {

        $tintuctop = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->take(3);
        return view('home.lienhe',['tintuctop' =>$tintuctop,]);
    }

    public function theloai($id)
    {

        $theloai= TheLoai::find($id);
        $loaitin= LoaiTin::where('idTheLoai',$id)->get('id');
      

        $tintucmoinhat = Tintuc::orderBy('created_at','desc')->where('NoiBat',1)->where('idTheLoai',$id)->where('KichHoat',1)->get()->toArray();
        $tintuc1 = array_slice($tintucmoinhat,0,1);
        $tintuc2 = array_slice($tintucmoinhat,1,4);
        $tintuc3 = Tintuc::orderBy('created_at','desc')->where('idTheLoai',$id)->where('KichHoat',1)->paginate(6);

         /*$tintuc5 = Tintuc::orderBy('created_at','desc')->where('idTheLoai',$id)->where('KichHoat',1)->paginate(15);*/
       $tintuctop = TinTuc::orderBy('SoLuotXem','desc')->where('idTheLoai',$id)->where('KichHoat',1)->take(3)->get();

         $tintucphobien = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->get()->random(10);



        $videomoinhat = Video::orderBy('created_at','desc')->where('idTheLoai',$id)->where('KichHoat',1)->get()->toArray();
            $video1 = array_slice($videomoinhat,0,10);

        $slidetheloai = Slide::orderBy('created_at','desc')->where('HinhDang','1')->take(1)->get();
        return view('home.theloai',['theloai'=>$theloai,'tintuc1' => $tintuc1,
        'tintuc2' => $tintuc2,'tintuc3'=>$tintuc3,'tintuctop'=>$tintuctop,'tintucphobien'=>$tintucphobien,'video1'=>$video1,'slidetheloai'=>$slidetheloai]);


    }

      public function theloaivideo($id)
    {

        $binhluanvideo = BinhLuanVideo::where('idVideo',$id)->where('KichHoat',0)->get();

        
        $theloai= TheLoai::find($id);
        $video = Video::orderBy('created_at','desc')->where('idTheLoai',$id)->where('KichHoat',1)->paginate(4);
        $videoxemnhieu = Video::orderBy('SoLuotXem','desc')->where('idTheLoai',$id)->where('KichHoat',1)->get()->random(4);

       // $tintucnoibat = Tintuc::orderBy('created_at','desc')->where('idTheLoai',$id)->where('NoiBat',1)->where('KichHoat',1)->get()->toArray();

        return view('homevideo.theloaivideo',['theloai'=>$theloai,'video' => $video,'videoxemnhieu'=>$videoxemnhieu,'binhluanvideo' => $binhluanvideo]);


    }

    public function loaitin($id)
    {

        $loaitin = Loaitin::find($id);
        //lay theo id va 5 tin 1 trang
        $tintucmoinhat=TinTuc::orderBy('created_at','desc')->where('idLoaiTin',$id)->where('NoiBat',1)->where('KichHoat',1)->get()->toArray();
        $tintuc1 = array_slice($tintucmoinhat,0,1);
        $tintuc2 = array_slice($tintucmoinhat,1,4);
        $tintuc3 = Tintuc::orderBy('created_at','desc')->where('idLoaiTin',$id)->where('KichHoat',1)->paginate(6);

        $tintuctop = TinTuc::orderBy('SoLuotXem','desc')->where('idLoaiTin',$id)->where('KichHoat',1)->take(3)->get();

        $tintucphobien = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->get()->random(5);

        $slideloaitin = Slide::orderBy('created_at','desc')->where('HinhDang','1')->take(1)->get();
       // $tintucmoinhat = Tintuc::orderBy('created_at','desc')->where('idloaitin',$id)->where('NoiBat',1)->where('KichHoat',1)->get()->toArray();


       // $tintucmoinhat = Tintuc::orderBy('created_at','desc')->where('idloaitin',$id)->where('KichHoat',1)->paginate(5);
        return view('home.loaitin',['tintuc1' => $tintuc1,
        'tintuc2' => $tintuc2,'tintuc3'=>$tintuc3,'tintuctop'=>$tintuctop,'tintucphobien'=>$tintucphobien,'loaitin'=>$loaitin,'slideloaitin'=> $slideloaitin]);
    }

   public  function tintuc($id)

    {
        $tintuc = TinTuc::find($id);


        $binhluan = BinhLuan::where('idBaiViet',$id)->where('KichHoat',0)->get();


        //lay ra 5 tin tuc noi bat

        $tintuctop = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->take(3)->get()->toArray();

        $tinxemnhieunhat = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->get()->random(6);

        //lay ra 5 tin tuc lien quan
        $tinlienquan = Tintuc::orderBy('created_at','desc')->where('KichHoat',1)->get()->random(6);



        //tang luot xem theo f5
         // DB::table('tintuc')->where('id',$id)->update(['SoLuotXem'=>$tintuc->SoLuotXem+1]);
        //tang luot xem khi 120s f5
          if(auth()->check() == false){

            $baivietKey = 'tintuc_'.$tintuc->id;

            if(Session::has($baivietKey)){
                if(time() - (int)Session::get($baivietKey) > 300){
                    // 300s cho mỗi lượt xem tính theo id user vào id bài viết
                    session()->forget($baivietKey);
                }
            }else{
                $tintuc->increment('SoLuotXem');
                Session::put($baivietKey,time());
            }
        }
        else
        {
            $id_user = auth()->user()->id;

            $baivietKey = $id_user.'tintuc_'.$tintuc->id;


            if(Session::has($baivietKey)){
                if(time() - (int)Session::get($baivietKey) > 120){
                    // 60s cho mỗi lượt xem tính theo id user vào id bài viết
                    session()->forget($baivietKey);
                }
            }else{
                $tintuc->increment('SoLuotXem');
                Session::put($baivietKey,time());
            }
        }

                return view('home.chitiettintuc',['binhluan'=>$binhluan,'tintuc'=>$tintuc,'tintuctop'=>$tintuctop,'tinlienquan'=>$tinlienquan,'tinxemnhieunhat'=>$tinxemnhieunhat,'tintuctop' =>$tintuctop]);
    }

 public  function video($id,$idVideo)

    {


        $video = Video::find($id);


        $binhluanvideo = BinhLuanVideo::where('idVideo',$id)->where('KichHoat',0)->get();

        

        $videoxemnhieunhat = Video::orderBy('SoLuotXem','desc')->where('NoiBat',1)->where('KichHoat',1)->take(5)->get();
       
        /*$tinlienquan = Tintuc::orderBy('created_at','desc')->where('KichHoat',1)->get()->toArray();
        $tinlienquan = array_slice($tinlienquan,0,10);*/


        //tang luot xem theo f5
         // DB::table('tintuc')->where('id',$id)->update(['SoLuotXem'=>$tintuc->SoLuotXem+1]);
        //tang luot xem khi 120s f5
          if(auth()->check() == false){

            $baivietKey = 'video_'.$video->id;

            if(Session::has($baivietKey)){
                if(time() - (int)Session::get($baivietKey) > 300){
                    // 60s cho mỗi lượt xem tính theo id user vào id bài viết
                    session()->forget($baivietKey);
                }
            }else{
                $video->increment('SoLuotXem');
                Session::put($baivietKey,time());
            }
        }
        else
        {
            $id_user = auth()->user()->id;
            // thời gian tồn tại session là 10s (testing)


            $baivietKey = $id_user.'video_'.$video->id;


            if(Session::has($baivietKey)){
                if(time() - (int)Session::get($baivietKey) > 120){
                    // 60s cho mỗi lượt xem tính theo id user vào id bài viết
                    session()->forget($baivietKey);
                }
            }else{
                $video->increment('SoLuotXem');
                Session::put($baivietKey,time());
            }
        }

                return view('homevideo.chitietvideo',['video'=>$video,'binhluanvideo'=>$binhluanvideo,'videoxemnhieunhat'=>$videoxemnhieunhat]);
    }



 public function tatcavideo()
    {

       
        $trend= Video::orderBy('created_at','desc')->where('KichHoat',1)->where('NoiBat',1)->take(3)->get();

        $videoall = Video::orderBy('created_at','desc')->where('KichHoat',1)->where('NoiBat',1)->get()->toArray();
        $videoall1 = array_slice($videoall,0,1);
         $videoall2 = array_slice($videoall,1,1);
          $videoall3 = array_slice($videoall,2,2);
          $videotop = Video::orderBy('SoLuotXem','desc')->where('KichHoat',1)->take(4)->get();
          $binhluanvideo = BinhLuanVideo::where('idVideo',$videoall1)->where('KichHoat',0)->get();
          $videomoinhat = Video::orderBy('created_at','desc')->where('KichHoat',1)->take(4)->get();
          
          $videoall = Video::orderBy('created_at','desc')->where('KichHoat',1)->get();
        return view('homevideo.trangchuvideo',['binhluanvideo'=>$binhluanvideo,'videoall'=>$videoall,'videoall1'=>$videoall1,'videoall2'=>$videoall2,'videoall3'=>$videoall3,'videotop'=>$videotop,'trend'=>$trend,'videomoinhat'=>$videomoinhat]);


    }
    public function tintucnoibat()
    {
        $tintucnb = TinTuc::orderBy('created_at','desc')->where('KichHoat',1)->where('NoiBat',1)->get()->toArray();
        $tintucnb1 = array_slice($tintucnb,0,1);
         $tintucnb2 = array_slice($tintucnb,1,2);
          $tintucnb3 = array_slice($tintucnb,3,3);
           $tintucnb4 = array_slice($tintucnb,6);
        return view('home.tintucnoibat',['tintucnb1'=>$tintucnb1,'tintucnb2'=>$tintucnb2,'tintucnb3'=>$tintucnb3,'tintucnb4'=>$tintucnb4]);


    }
}
