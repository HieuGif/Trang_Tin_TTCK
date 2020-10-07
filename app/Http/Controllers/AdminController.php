<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function getIndex()
    {
        if(Auth::user()->quyen != "0"  )
        {
        return view('admin.dashboard');
        }
        if (Auth::check()) {
            // The user is logged in...

        return redirect('admin')->with('thongbao','Bạn không đủ quyền hạn truy cập hệ thống!');
        }
    }

	public function getError403()
    {
        return view('errors.403');
    }
}
