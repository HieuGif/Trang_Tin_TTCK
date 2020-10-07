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
use App\LienHe;
use App\Video;
Use Socialite;
use Validator,Redirect,Response,File;



use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Hashing\BcryptHasher;
class PageController extends Controller
{
    //

   /* function __construct()
    {
    	$theloai = TheLoai::all();
    	//truyen bien the loai vao cac view
    	view()->share('theloai',$theloai);
        $slide = Slide::all();
        //truyen bien the loai vao cac view
        view()->share('theloai',$theloai);

    }*/
    //do da tao function boot trong appserviceprovider ... truyen bien cho các view



    function getDangnhap()
    {
        $tintuctop = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->take(3)->get();
        return view('home.dangnhap',['tintuctop'=>$tintuctop])->with('thongbaoloi','Đăng nhập không thành công');
        return redirect()->back();
    }

    function postDangnhap(Request $request)
    {

       $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required',

            ],
            [
                'email.required'=>'Bạn chưa nhập tài khoản',

                 'password.required'=>'Bạn chưa nhập mật khẩu',

            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))

         {
            if(Auth::user()->kichhoat == "1" )
            {
             return \redirect()->back()->with('thongbao','Đăng nhập thành công!');;
            }

            elseif(Auth::user()->kichhoat == "0")
            {
                 Auth::logout();
                return \redirect()->back()->with('thongbaoloi','Tài khoản của bạn đã bị khóa. Vui lòng liên hệ admin để biết thêm chi tiết!');
            }

         }
         else
          {
            return \redirect()->back()->with('thongbaoloi','Tài khoản hoặc mật khẩu không đúng!');
          }
    }

    function getDangxuat()
    {
        Auth::logout();
        return redirect()->back();
    }

    function getDoiMatKhau()
    {
        $tintuctop = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->take(3)->get();
        if(Auth::check())
        return view('home.doimatkhau',['user'=>Auth::user(),'tintuctop'=>$tintuctop]);
        else
        return redirect('dangnhap')->with('message','Bạn chưa đăng nhập!');
    }
    function postDoiMatKhau(Request $request)
    {
     $this->validate($request,
            [
                'old_password' => 'required|max:255',
                'password'=>'required|min:6',
                'passwordAgain'=>'required|same:password'

            ],
            [
                'password.required'=>'Bạn chưa nhập mật khẩu mới',
                'password.min'=>"Mật khẩu phải có tối thiểu 6 kí tự ",
                 'passwordAgain.required'=>"Bạn chưa nhập lại mật khẩu",
                 'passwordAgain.same'=>"Mật khẩu nhập lại chưa khớp",


            ]);
            $user = DB::table('users')->where('id', '=', Auth::user()->id)->first();
		    $hash = new BcryptHasher();
		    if($hash->check($request->old_password, $user->password))
		    {
			DB::table('users')->where('id', Auth::user()->id)->update([
				'password' => bcrypt($request->passwordAgain),
				'updated_at' => Carbon::now()
            ]);
         return \redirect()->back()->with('thongbao','Cập nhật thông tin tài khoản thành công');
            }
        else
        return redirect('doimatkhau')->with('thongbaoloi', 'Mật khẩu cũ không chính xác!');
    }



    function getDangky()
    {
        $tintuctop = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->take(3)->get();
        return view('home.dangky',['tintuctop'=>$tintuctop]);
    }

    function postDangky(Request $request)
    {
            $this->validate($request,
            [
                'name'=>'required|min:4',
                'email' =>'required|email|unique:users,email',
                'password'=>'required|min:4',
                'passwordAgain'=>'required|same:password'

            ],
            [

                'name.required'=>'Bạn chưa nhập tên người dùng',
                'name.min'=>'Tên người dùng phải tối thiểu 4 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>"Mật khẩu phải tối thiểu 4 kí tự ",

                 'passwordAgain.required'=>"Bạn chưa nhập lại mật khẩu",
                 'passwordAgain.same'=>"Mật khẩu nhập lại chưa khớp",


            ]
        );
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->kichhoat = 1;

         $user->save();

   return redirect("dangky")->with('thongbao','Đăng ký tài khoản thành công');
    }

    function getTimKiem(Request $request)
    {

        $tukhoa = $request->get('tukhoa');
        //tim kiem theo tieu de lay ket qua phan ra 5 trang
        $tintuc = Tintuc::where('KichHoat',1)->where('TieuDe','like',"%$tukhoa%")->paginate(6);
        $tintuctop = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->take(3)->get();
        return view('home.timkiem',['tukhoa'=>$tukhoa,'tintuc'=>$tintuc,'tintuctop'=>$tintuctop]);
        

    }
    function getTimKiemVideo(Request $request)
    {

        $tukhoa = $request->get('tukhoa');
        //tim kiem theo tieu de lay ket qua phan ra 5 trang
        $video = Video::where('KichHoat',1)->where('TieuDe','like',"%$tukhoa%")->paginate(4);

    return view('homevideo.timkiemvideo',['tukhoa'=>$tukhoa,'video'=>$video]);

    }

    function getAdminNguoidung()
    {
        if(Auth::check())
        return view('admin/doimatkhau',['user'=>Auth::user()]);
        else
        return redirect('dangnhap')->with('message','Bạn chưa đăng nhập!');
    }

    function postAdminNguoidung(Request $request)
    {
     $this->validate($request,
            [
                'old_password' => 'required|max:255',
                'new_password'=>'required|min:6',
                'new_password_confirmation'=>'same:new_password',

            ],


            [
                'new_password.required'=>'Bạn chưa nhập mật khẩu',
                'new_password.min'=>"Mật khẩu phải tối thiểu 6 kí tự ",
                'new_password_confirmation.required'=>"Bạn chưa nhập lại mật khẩu",
                'new_password_confirmation.same'=>"Mật khẩu nhập lại chưa khớp",
            ]);
            $user = DB::table('users')->where('id', '=', Auth::user()->id)->first();
		    $hash = new BcryptHasher();
		    if($hash->check($request->old_password, $user->password))
		    {
			DB::table('users')->where('id', Auth::user()->id)->update([
				'password' => bcrypt($request->new_password),
				'updated_at' => Carbon::now()
            ]);

         return redirect('admin/doimatkhau')->with('thongbao','Cập nhật thông tin tài khoản thành công');
    }
    else
            return redirect('admin/doimatkhau')->with('thongbaoloi', 'Mật khẩu cũ không chính xác!');
}

public function redirectToProvider()
{
    return Socialite::driver('google')->redirect();
}
public function handleProviderCallback()
{
    try {
        $user = Socialite::driver('google')->user();
    } catch (\Exception $e) {
        return redirect('/dangnhap');
    }
    // only allow people with @company.com to login
    if(explode("@", $user->email)[1] != 'gmail.com'){
        return redirect()->to('/dangnhap')->with('thongbaoloi','Tài khoản gmail không hợp lệ!');
    }
    // check if they're an existing user
    $existingUser = User::where('email', $user->email)->first();
    if($existingUser){
        // log them in
        auth()->login($existingUser, true);
    } else {
        // create a new user
        $newUser                  = new User;
        $newUser->name            = $user->name;
        $newUser->email           = $user->email;
        $newUser->quyen          = 7;
        $newUser->kichhoat       = 1;
        $newUser->save();
        auth()->login($newUser, true);
    }
    return redirect()->to('/dangnhap');
}

public function redirect($provider)
{
    return Socialite::driver($provider)->redirect();
}
public function callback($provider)
{
  $getInfo = Socialite::driver($provider)->user();
  $user = $this->createUser($getInfo,$provider);
  auth()->login($user);
  return redirect()->to('/');
}
function createUser($getInfo,$provider){
$user = User::where('provider_id', $getInfo->id)->first();
if (!$user) {
     $user = User::create([
        'name'     => $getInfo->name,
        'email'    => $getInfo->email,
        'provider' => $provider,
        'provider_id' => $getInfo->id,
    ]);
  }
  return $user;
}

function postLienHe(Request $request)
{
    $user = User::all();

        $this->validate($request,
        [
            'name'=>'required|min:4',
            'email' =>'required',
            'NoiDung'=>'required|min:4',

        ],
        [

            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải tối thiểu 4 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dạng email',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'NoiDung.min'=>"Nội dung phải tối thiểu 4 kí tự ",


        ]
    );
    $lienhe = new LienHe;
    $lienhe->Ten = $request->name;
    $lienhe->Email = $request->email;
    $lienhe->NoiDung = $request->NoiDung;
     $lienhe->save();

return redirect("lienhe")->with('thongbao','Đã gửi tin nhắn thành công!');
}

public function getLienHe()
{
    $user = User::all();
    $tintuctop = TinTuc::orderBy('SoLuotXem','desc')->where('KichHoat',1)->take(3)->get();
    $vuaqua = TinTuc::orderBy('updated_at','desc')->take(3)->get();
    return view('home.lienhe',['user'=>$user,'tintuctop'=>$tintuctop,'vuaqua'=>$vuaqua]);
}
}

