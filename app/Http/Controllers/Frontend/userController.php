<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Controllers\Controller;
use App\Models\sinh_vien;
use App\Models\phan_hoi;
use App\Models\giang_vien;
use App\Models\thao_luan;
use DB;
use Carbon;


use Illuminate\Http\Request;


class userController extends Controller
{

	  //view Gửi Yêu Cầu
	   function contactStudent()
    {  
       if (Auth::check()) {
        
        $list_phanhoi = DB::table('phan_hoi')
        ->join('giang_vien','giang_vien.id_giangvien','=','phan_hoi.id_giangvien')
       
        ->select('phan_hoi.*','giang_vien.ten_giangvien as tengv')->get();
       
         
       $list_gv=giang_vien::get();
       $list_sv=sinh_vien::get();
        return view('frontend.contact',['list_phanhoi'=>$list_phanhoi,'list_gv'=>$list_gv,'list_sv'=>$list_sv]);
           }    
           else{
            return view('frontend.loginstudent');
           }

        
      }

     function  postcontactStudent(Request $req)
      {

      	//$this->AuthLogin();
        $data = array();
          $data['noi_dung'] =$req->noidung; 
        $data['trang_thai'] =$req->trangthai; 
      $data['id_giangvien'] =$req->giangvien;
       $data['id_sinhvien'] =$req->sinhvien; 
        
         DB::table('phan_hoi')->insert($data);
            Session::put('message','Thêm yêu cầu thành công!');
              return redirect()->back();
              
    
      

       

       
       
       

      }

          //view Thảo Luận
    function talkpageStudent()
    {
      if(Auth::check()){
        $list_tl=thao_luan::get();
         return view('frontend.talkpage',compact('list_tl'));
      }
      else{
        return view('frontend.loginstudent');
      }
      
       
    }
    function postsStudent(){
      return view('frontend.posts');
    }
    
}