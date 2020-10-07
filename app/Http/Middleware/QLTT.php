<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class QLTT
{

    public function handle($request, Closure $next)
    {
        if(Auth::user()->quyen == "1" || Auth::user()->quyen == "3"||Auth::user()->quyen == "5")
		{
			return $next($request);
        }
         else
         Auth::logout();
		return redirect('admin')->with('thongbao', 'Người dùng không đủ quyền hạn để thao tác chức năng này!');


    }
}
