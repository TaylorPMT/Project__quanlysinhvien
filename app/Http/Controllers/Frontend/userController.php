<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Controllers\Controller;
use App\Models\sinh_vien;
use App\Models\phan_hoi;
use App\Models\giang_vien;
use App\Models\thao_luan;
use App\Models\lop_monhoc;
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
     //  $list_gv=lop_monhoc::get('id_giangvien')
      //  $id_giang= DB::table('phan_hoi')->where('id_giangvien', '=', $list_gv)->get('id_giangvien');
        
        $data = array();
        $data['noi_dung'] =$req->noidung; 
        $data['trang_thai'] ='0'; 
      //$data['id_giangvien'] =$id_gv;  //id gv trong lớp môn hc
        $data['id_sinhvien'] =Auth::user()->id; 
        
         DB::table('phan_hoi')->insert($data);
          
              return redirect()->back()->with("message",["type"=>"success","msg"=>"Một yêu cầu đã được gửi đến GV  "]);

      
      }

          //view Thảo Luận
    function talkpageStudent()
    {
      if(Auth::check()){
        $list_tl=DB::table('thao_luan')
        ->join('sinh_vien','sinh_vien.id_sinhvien','=','thao_luan.id_sinhvien')
       
        ->select('thao_luan.*','sinh_vien.ten_sinhvien as tensv')->get();
       
         return view('frontend.talkpage',compact('list_tl'));
      }
      else{
        return view('frontend.loginstudent');
      }
      
       
    }
    function postsStudent(){
      

      return view('frontend.posts');
    }
    function Post_postsStudent(Request $req){
       $arr = array();
       $arr['tieu_de'] =$req->title;
       $arr['noi_dung'] =$req->content; 
        $arr['id_giangvien'] =1;
        $arr['id_lop_monhoc'] =2;
        $arr['id_sinhvien'] =Auth::user()->id; 
      
         DB::table('thao_luan')->insert($arr);
          return redirect()->back()->with("message",["type"=>"success","msg"=>"Một yêu cầu đã được gửi đến GV  "]);
    }
    
}