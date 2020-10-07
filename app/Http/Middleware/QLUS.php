<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class QLUS
{
    public function handle($request, Closure $next)
    {

         if(!Auth::check())
         {
		return redirect('admin')->with('thongbao', 'Bạn chưa đăng nhập');
         }

         else

         {
			return $next($request);
         }


    }
}
