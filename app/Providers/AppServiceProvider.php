<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\Video;
use App\User;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //truyen bien vao cac function, view can dung
        $theloai = TheLoai::OrderBy('updated_at','desc')->get();
        view()->share('theloai',$theloai);

        $video = Video::all();
        view()->share('video',$video);

        $loaitin = LoaiTin::all();
        view()->share('loaitin',$loaitin);

        $tintuc = TinTuc::where('KichHoat',1)->get();
        view()->share(['tintuc',$tintuc]);

        $slide = Slide::all();
        view()->share('slide',$slide);

        $user = User::all();
        view()->share('user',$user);

        if(Auth::check())
        {
            view()->share('nguoidung',Auth::user());
        }

    }

}
