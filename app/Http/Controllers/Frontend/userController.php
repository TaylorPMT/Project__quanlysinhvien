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
       $list_sv=sinh_vien::get();
        return view('frontend.contact',compact('list_phanhoi','list_gv','list_sv'));
      }

     function  postcontactStudent(Request $req)
      {

      	/*$this->validate($req,[
        'noidung' => 'required',
        
    ],[
         'noidung.required'=>'Bạn chưa nhập nội dung',

       ]);*/
      
      

       

       $phanhoi= new phan_hoi;
       $phanhoi->noi_dung = $req->noidung;
       $phanhoi->trang_thai=$req->trangthai;
       $phanhoi->id_giangvien=$req->giangvien;
       $phanhoi->id_sinhvien=$req->sinhvien;
          
       $phanhoi->save();
       
       	return view('frontend.home');
       

      }

          //view Thảo Luận
    function talkpageStudent()
    {
        return view('frontend.talkpage');
    }
    function postsStudent(){
      return view('frontend.posts');
    }
    
}