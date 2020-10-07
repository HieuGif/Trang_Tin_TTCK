<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ForgotPassword extends Controller
{
    public function forgot()
    {
    	return view('admin.forgot');
    }
    public function password(Request $request)
    {
    	dd($request->all());
    }
}
