<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Page extends Controller
{
    //trang chủ
    function home__Page()
    {
        return view('frontend.home');
    }
    //Đăng Nhập Sinh Viên

    function loginStudent()
    {
        return view('frontend.loginstudent');
    }
    // view trang đăng ký

    function registrationStudent()
    {
        return view('frontend.registration');
    }
}
