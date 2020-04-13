<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;

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
    function postloginStudent(Request $request)
    {
        $username=$request->username;
        $password=$request->password;
      $data=['name'=>$username,'password'=>$password,'access'=>1];
      if(Auth::attempt($data))
      {

       return redirect()->route('dashboard');
      }
      else
      {
          return redirect()->route('loginStudent');
      }


    }
    function dashboard()
    {
        return view('frontend.dashboard');
    }
    // view trang đăng ký

    function registrationStudent()
    {
        return view('frontend.registration');
    }
    function logout()
    {
        if(Auth::check())
        {
         Auth::logout();
        }
        return redirect()->route('loginStudent');
    }
}
