<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TinTuc;
use App\Video;
use App\BinhLuanVideo;
use App\BinhLuan;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
      public function getDanhSach()
    {
    	$user = User::orderBy('created_at','desc')->get();
		return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem()
    {

    	return view('admin.user.them');
    }

     public function postThem(Request $request)
    {

    	$this->validate($request,
    		[
    			'name'=>'required|min:3',
    			'email' =>'required|email|unique:users,email',
    			'password'=>'required|min:6',
    			'passwordAgain'=>'required|same:password'

    		],
    		[

    			'name.required'=>'Bạn chưa nhập tên người dùng',
    			'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
    			'email.required'=>'Bạn chưa nhập email',
    			'email.email'=>'Bạn chưa nhập đúng định dạng email',
    			'email.unique'=>'Email đã tồn tại',
    			'password.required'=>'Bạn chưa nhập mật khẩu',
    			'password.min'=>"Mật khẩu phải có ít nhất 6 kí tự ",
                'password.max'=>"Mật khẩu phải có ít nhất 6 kí tự ",
                 'passwordAgain.required'=>"Bạn chưa nhập lại mật khẩu",
                 'passwordAgain.same'=>"Mật khẩu nhập lại chưa khớp",


    		]
    	);
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->kichhoat = 1;
         $user->save();

    return redirect('admin/user/them')->with('thongbao','Thêm người dùng thành công');
	}

    public function getSua($id)
    {

    	$user = User::find($id);

    	return view('admin.user.sua',['user'=>$user]);

    }
     public function postSua(Request $request,$id)
    {
    	$this->validate($request,
            [
                'name'=>'required|min:3',
                'email'=>'required|min:3',
                'password'=>'unique:users,password,'.$id,
                'passwordAgain'=>'same:password|unique:users,password,'.$id,

            ],
            [
                'email.required'=>'Bạn chưa nhập người dùng',
                'name.required'=>'Bạn chưa nhập tên người dùng',
                'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',

                 'passwordAgain.same'=>"Mật khẩu nhập lại chưa khớp"

            ]);
        if(Auth::user()->quyen == "1" && Auth::user()->kichhoat == "1" )
        {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->kichhoat = 1;
         $user->save();
        }



    return redirect('admin/user/sua/'.$id)->with('thongbao','Cập nhật người dùng thành công');
}

    public function getXoa($id)
    {
        $kiemtracomment=BinhLuan::where('idUser',$id)->get();
        $kiemtracommentvideo=BinhLuanVideo::where('idUser',$id)->get();
        $kiemtrabaiviet=TinTuc::where('idUser',$id)->get();
        $kiemtravideo=Video::where('idUser',$id)->get();

        if(count($kiemtracomment)==0 && count($kiemtracommentvideo)==0 && count($kiemtrabaiviet)== 0 && count($kiemtravideo)==0)
        {
            $user = User::find($id);
          $user->delete($id);
            return redirect()->back()->with('thongbao','Xóa người dùng thành công');
         }
         else
         {
             return redirect()->back()->with('thongbaoloi','Không thể xóa vì người dùng đã bình luận hoặc đăng bài viết, video');
         }


    }

    public function getDangnhapAdmin()
    {
        return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request)
    {
          $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required'

            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                 'password.required'=>"Bạn chưa nhập mật khẩu",

            ]);
         if(Auth::attempt(['email'=>$request->email,'password'=>$request->password] ) && (Auth::user()->kichhoat == "1"))
         {
            return redirect('admin/dashboard');
         }
         if(Auth::attempt(['email'=>$request->email,'password'=>$request->password] ) && (Auth::user()->kichhoat == "0"))
         {
            return redirect('admin')->with('thongbao','Tài khoản của bạn đã bị khóa!');
         }
            else
            {
                return redirect('admin')->with('thongbao','Tài khoản hoặc mật khẩu không đúng!');
            }


    }
        public function getDangxuatAdmin()
        {
            Auth::logout();
            return redirect('admin');
        }

   public  function getUserKichHoat($id)
    {
       $user = User::find($id);
        $user->kichhoat = 1 - $user->kichhoat;
        $user->save();

        return redirect('admin/user/danhsach');

    }


}
