<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\ds_thanhviennhom;
use App\Models\lop_monhoc;
use App\Models\mon_hoc;
use App\Models\nhom;
use App\Models\sinh_vien;

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
            $id_taikhoan=Auth::user()->id;
            $sql_query=sinh_vien::where('id_taikhoan','=',$id_taikhoan)->first();
            $ten_sinh_vien=$sql_query->ten_sinhvien;
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
        ->join("nhom","lop_monhoc.id_lop_mh","=","nhom.id_lopmonhoc")
        ->select('lop_monhoc.*','mon_hoc.ten_monhoc as tenmonhoc','nhom.ten_nhom as ten_nhom','nhom.id_nhom as id_nhom')->orderBy('id_nhom','desc')->get();
        $nhom_da_dangky=ds_thanhviennhom::join("nhom","nhom.id_nhom","=","ds_thanhviennhom.id_nhom")->select('nhom.id_nhom as id_nhom_dk')->get();




        return view('frontend.course_registration',compact('list_lopmonhoc','nhom_da_dangky'));


    }
    function registration_group($id_group)
    {
        $id_sinhvien=Auth::user()->id;
        $id_nhom=$id_group;



        $row_ds_thanhviennhom= new ds_thanhviennhom;
        $row_ds_thanhviennhom->id_nhom=$id_nhom;

        $row_ds_thanhviennhom->id_sinhvien=$id_sinhvien;
        if($row_ds_thanhviennhom->save()==true)
        {
           return redirect()->back()->with("message",["type"=>"success","msg"=>"Đăng Ký Nhóm Thành Công "]);
        }
        else{
            echo "false";
        }
    }

}
