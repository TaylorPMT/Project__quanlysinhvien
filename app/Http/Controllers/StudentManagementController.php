<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class StudentManagementController extends Controller
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
    public function add_student(){
        $this->AuthLogin();
        return view('admin.add_student');
    }
    public function all_student(){
        $this->AuthLogin();
        $all_student = DB::table('sinh_vien')->get();
        $manager_student = view('admin.all_student')->with('all_student',$all_student);
        return view('admin_layout')->with('admin.all_student',$manager_student);
    }
    public function save_student(Request $request){
        $this->AuthLogin();
        $data = array();
        $id = array();
        $id = DB::table('tai_khoan')->value('id');
        $data['ten_sinhvien'] = $request->student_name;
        $data['gioi_tinh'] = $request->student_sex;
        $data['dia_chi'] = $request->student_address;
        $data['sdt'] = $request->student_phone;
        $data['id_taikhoan'] = $id;
        
        //$dulieu = DB::table('nha_cung_cap')->where('tenNcc',$request->brand_product_name)->get();
        $new = $data['ten_sinhvien'];
        $dulieu = DB::table('sinh_vien')->where('ten_sinhvien',$request->student_name)->value('ten_sinhvien');
        if($new==$dulieu){
            Session::put('message','Sinh viên đã tồn tại!');
            return Redirect::to('add-student');
        }else{

            DB::table('sinh_vien')->insert($data);
            Session::put('message','Thêm sinh viên thành công!');
            return Redirect::to('add-student');
        }
    }
    
    public function edit_student($student_id){
        $this->AuthLogin();
        $edit_student = DB::table('sinh_vien')->where('id_sinhvien',$student_id)->get();
        $manager_student = view('admin.edit_student')->with('edit_student',$edit_student);
        return view('admin_layout')->with('admin.edit_student',$manager_student);
    }
    public function update_student(Request $request,$student_id){
       $this->AuthLogin();
        $data = array();
        $id = array();
        $id = DB::table('tai_khoan')->value('id');
        $data['ten_sinhvien'] = $request->student_name;
        $data['gioi_tinh'] = $request->student_sex;
        $data['dia_chi'] = $request->student_address;
        $data['sdt'] = $request->student_phone;
        $data['id_taikhoan'] = $id;
        DB::table('sinh_vien')->where('id_sinhvien',$student_id)->update($data);
        Session::put('message','Cập nhật thông tin thành công!');
        return Redirect::to('all-student');
    }
    public function delete_student($student_id){
        $this->AuthLogin();
        DB::table('sinh_vien')->where('id_sinhvien',$student_id)->delete();
        Session::put('message','Xóa sinh viên thành công!');
        return Redirect::to('all-student');
    }

    


}
