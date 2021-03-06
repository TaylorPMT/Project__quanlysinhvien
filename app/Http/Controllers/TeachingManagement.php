<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class TeachingManagement extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else
        {
            return Redirect::to('admin')->send();
        }
    }
    public function add_teaching(){
        $this->AuthLogin();
        
        $account_classsub = DB::table('lop_monhoc')->orderby('id_lop_mh','desc')->get();
        return view('admin.add_teaching')->with('account_classsub',$account_classsub);
    }
    public function all_teaching(){
        $this->AuthLogin();
             $admin_id=Session::get('admin_id');
        $giangvienId = DB::table('giang_vien')->where('id_taikhoan','=',$admin_id)->value('id_giangvien');
       $l_lopmonhoc=DB::table('lop_monhoc')->where('lop_monhoc.id_giangvien','=',$giangvienId)->join('giang_day','giang_day.id_lopmonhoc','=','lop_monhoc.id_lop_mh')->select('lop_monhoc.*','giang_day.*')->get();
       

      
        
        $manager_teaching = view('admin.all_teaching')->with('l_lopmonhoc',$l_lopmonhoc);
        return view('admin_layout')->with('admin.all_teaching',$manager_teaching);
    }
    public function save_teaching(Request $request){
        $this->AuthLogin();
        $data = array();
        
        $data['tiet_bd'] = $request->teaching_start;
        $data['tiet_kt'] = $request->teaching_end;
        $data['lich_day'] = $request->teaching_schedule;
        $data['id_lopmonhoc'] = $request->classsub_id;
        
        //$dulieu = DB::table('nha_cung_cap')->where('tenNcc',$request->brand_product_name)->get();
            DB::table('giang_day')->insert($data);
            Session::put('message','Thêm lịch giảng dạy thành công!');
            return Redirect::to('add-teaching');
    }
    
    public function edit_teaching($teaching_id){
        $this->AuthLogin();
        $account_classsub = DB::table('lop_monhoc')->orderby('id_lop_mh','desc')->get();
        $edit_teaching = DB::table('giang_day')->where('id_giangday',$teaching_id)->get();
        $manager_teaching = view('admin.edit_teaching')->with('edit_teaching',$edit_teaching)->with('account_classsub',$account_classsub);
        return view('admin_layout')->with('admin.edit_teaching',$manager_teaching);
    }
    public function update_teaching(Request $request,$teaching_id){
       $this->AuthLogin();
        $data = array();
        
        $data['tiet_bd'] = $request->teaching_start;
        $data['tiet_kt'] = $request->teaching_end;
        $data['lich_day'] = $request->teaching_schedule;
        $data['id_lopmonhoc'] = $request->classsub_id;
        DB::table('giang_day')->where('id_giangday',$teaching_id)->update($data);
        Session::put('message','Cập nhật thông tin thành công!');
        return Redirect::to('all-teaching');
    }
    public function delete_teaching($teaching_id){
        $this->AuthLogin();
        DB::table('giang_day')->where('id_giangday',$teaching_id)->delete();
        Session::put('message','Xóa lịch giảng dạy thành công!');
        return Redirect::to('all-teaching');
    }

    


}
