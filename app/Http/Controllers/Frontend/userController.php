<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Controllers\Controller;
use App\Models\sinh_vien;
use App\Models\phan_hoi;
use App\Models\giang_vien;
use DB;

use Illuminate\Http\Request;


class userController extends Controller
{

	  //view Gửi Yêu Cầu
	   function contactStudent()
    {    
        $list_phanhoi=DB::table('phan_hoi')
     ->join("giang_vien","phan_hoi.id_giangvien","=","giang_vien.id_giangvien")
     ->join("sinh_vien","phan_hoi.id_sinhvien","=","sinh_vien.id_sinhvien")
     ->select('phan_hoi.*','giang_vien.ten_giangvien as tengv','sinh_vien.ten_sinhvien  as tensv')->get();
        

       $list_gv=giang_vien::get();
        return view('frontend.contact',compact('list_phanhoi','list_gv'));
      }

     /* function postcontactStudent(Request $req)
      {
       $phanhoi= new phan_hoi;
       $phanhoi->noi_dung = $req->noidung;
       $phanhoi->ten_giangvien=$req->giangvien;
       $phanhoi->trang_thai=$req->trangthai;
       $phanhoi->save();
       return view('frontend.contact');

      }*/

          //view Thảo Luận
    function talkpageStudent()
    {
        return view('frontend.talkpage');
    }
    
}