<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SubjectManagementController extends Controller
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
    public function add_subject(){
        $this->AuthLogin();
        return view('admin.add_subject');
    }
    public function all_subject(){
        $this->AuthLogin();
        $all_subject = DB::table('mon_hoc')->get();
        $manager_subject = view('admin.all_subject')->with('all_subject',$all_subject);
        return view('admin_layout')->with('admin.all_subject',$manager_subject);
    }
    public function save_subject(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['so_tiet'] = $request->subject_secretion;
        $data['so_tinchi'] = $request->student_credits;
        $data['ten_monhoc'] = $request->subject_name;
        
        //$dulieu = DB::table('nha_cung_cap')->where('tenNcc',$request->brand_product_name)->get();
        $new = $data['ten_monhoc'];
        $dulieu = DB::table('mon_hoc')->where('ten_monhoc',$request->subject_name)->value('ten_monhoc');
        if($new==$dulieu){
            Session::put('message','Môn học đã tồn tại!');
            return Redirect::to('add-subject');
        }else{

            DB::table('mon_hoc')->insert($data);
            Session::put('message','Thêm môn học thành công!');
            return Redirect::to('add-subject');
        }
    }
    
    public function edit_subject($subject_id){
        $this->AuthLogin();
        $edit_subject = DB::table('mon_hoc')->where('id_monhoc',$subject_id)->get();
        $manager_subject = view('admin.edit_subject')->with('edit_subject',$edit_subject);
        return view('admin_layout')->with('admin.edit_subject',$manager_subject);
    }
    public function update_subject(Request $request,$subject_id){
       $this->AuthLogin();
        $data = array();
        $data['so_tiet'] = $request->subject_secretion;
        $data['so_tinchi'] = $request->student_credits;
        $data['ten_mochoc'] = $request->subject_name;
        DB::table('mon_hoc')->where('id_monhoc',$subject_id)->update($data);
        Session::put('message','Cập nhật thông tin thành công!');
        return Redirect::to('all-subject');
    }
    public function delete_subject($subject_id){
        $this->AuthLogin();
        DB::table('mon_hoc')->where('id_monhoc',$subject_id)->delete();
        Session::put('message','Xóa môn học thành công!');
        return Redirect::to('all-subject');
    }

    


}
