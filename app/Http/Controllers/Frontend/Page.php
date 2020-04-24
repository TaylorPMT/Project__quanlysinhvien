<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Controllers\Controller;
use App\Models\lop_monhoc;
use App\Models\mon_hoc;
use App\Models\sinh_vien;
use App\Models\thong_bao;
use App\Models\phan_hoi;
use App\Models\giang_vien;

use Illuminate\Http\Request;


class Page extends Controller
{
    //trang chủ
    function home__Page()
    { 
        $list_thong_bao=thong_bao::get();

        return view('frontend.home',compact('list_thong_bao'));
     
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
            $id_taikhoan=Auth::user()->id;
            $sql_query=sinh_vien::where('id_taikhoan','=',$id_taikhoan)->first();
            $ten_sinh_vien=$sql_query->ten_sinhvien;
            $id_sinh_vien=$sql_query->id_sinhvien;
            $request->session()->put('ten_sinh_vien',$ten_sinh_vien);
       return redirect()->route('dashboard');
      }
      else
      {

          return redirect()->route('loginStudent')->with('msg','Đăng Nhập Thất Bại');
      }


    }
    function dashboard()
    {
        return view('frontend.dashboard');
    }
    // view trang đăng ký

    function registrationStudent()
    {
        $list_mon_hoc=mon_hoc::get();

        return view('frontend.registration',compact('list_mon_hoc'));
    }
    function logout(Request $request)
    {
        if(Auth::check())
        {
         Auth::logout();
        $request->session()->flush();
        }

        return redirect()->route('loginStudent');
    }
    function course_registration($id_courser)
    {

        $list_lopmonhoc=lop_monhoc::where('lop_monhoc.id_monhoc','=',$id_courser)
        ->join("mon_hoc","lop_monhoc.id_monhoc","=","mon_hoc.id_monhoc")
        ->select('lop_monhoc.*','mon_hoc.ten_monhoc as tenmonhoc')->get()
        ;

        return view('frontend.course_registration',compact('list_lopmonhoc'));


    }
  
 
   
  
}
