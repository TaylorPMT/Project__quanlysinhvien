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
use App\Models\ds_thanhvienlop_mh;
use DB;
use Carbon;
use App\Models\Comment;


use Illuminate\Http\Request;


class userController extends Controller
{

	  //view Gửi Yêu Cầu
	   function contactStudent($id_giangvien,$id_lop_mh)
    {  
       if (Auth::check()) {
       

           $list_phanhoi = DB::table('phan_hoi')->where('id_lop_mh','=',$id_lop_mh)->get();
       
       
    
            
        return view('frontend.contact',['list_phanhoi'=>$list_phanhoi,'id_giangvien'=>$id_giangvien,'id_lop_mh'=>$id_lop_mh]);
           } 
           
           else{
            return view('frontend.loginstudent');
           }
           

        
      }

      function getdanhsach($id_lop_mh){
         $ds=DB::table('phan_hoi')->where('id_lop_mh','=',$id_lop_mh)->get();
       $output = "<table class='table'>";
                $output.=" <tr>
                  <th  > STT </th>
                  <th  >Nội Dung  </th>
                  
                  <th>Phản Hồi</th>

                </tr>";
              
                                   
                         foreach ($ds as  $item){
                          if($item->trang_thai == 1){
                        $output .= "<tr>
                            <th > $item->id_phanhoi </th>
                            <td> $item->noi_dung </td>
                           
                            <td>$item->phan_hoigv</td>
                        </tr>";
                       }
                       }
                     $output.="</table>";
                     return Response($output);
      }

     function  postcontactStudent(Request $req,$id_giangvien,$id_lop_mh)
      {  
     

        $data = array();
        $data['noi_dung'] =$req->noidung; 
        $data['trang_thai'] ='0'; 
      
       $data['id_giangvien'] = $id_giangvien;
        $data['id_lop_mh']=$id_lop_mh;
        //id gv trong lớp môn hc
        $data['id_sinhvien'] =Auth::user()->id; 
        
         DB::table('phan_hoi')->insert($data);
          
              return redirect()->back()->with("message",["type"=>"success","msg"=>"Một yêu cầu đã được gửi đến GV  "]);

      
      }
   

      //////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////

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

       function getComments()
      {
        $comment=DB::table('Comment')->get();
         return view('frontend.talkpage',compact('comment'));

      }
      function postComments($id_binhluan,Request $req)
    {
      $id_thaoluan=$id_binhluan;
      $comment=new Comment;
      
      $comment->id_user=Auth::use()->id;
      $comment->noi_dung=$req->noidung;
      $comment->save();
      return redirect('frontend.talkpage');

    }
}