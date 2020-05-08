<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ClassroomManagement extends Controller
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
    public function add_classroom(){
        $this->AuthLogin();
        $account_classroom = DB::table('giang_vien')->orderby('id_giangvien','desc')->get();
        $account_student = DB::table('sinh_vien')->orderby('id_sinhvien','desc')->get();
        return view('admin.add_classroom')->with('account_classroom',$account_classroom)->with('account_student',$account_student);
    }
    public function all_classroom(){
        $this->AuthLogin();
        
        $admin_id=Session::get('admin_id');
        $giangvienId = DB::table('giang_vien')->where('id_taikhoan','=',$admin_id)->value('id_giangvien');
        $all_classroom = DB::table('lop')
        ->join('giang_vien','giang_vien.id_giangvien','=','lop.id_giangvien')->where('lop.id_giangvien','=',$giangvienId)
        ->join('tai_khoan','tai_khoan.id','=','giang_vien.id_taikhoan')
        ->join('sinh_vien','sinh_vien.id_sinhvien','=','lop.id_sinhvien')
        ->orderby('lop.id_lop','desc')->get();
        $manager_classroom = view('admin.all_classroom')->with('all_classroom',$all_classroom);
        return view('admin_layout')->with('admin.all_classroom',$manager_classroom);
    }
    public function save_classroom(Request $request){
        $this->AuthLogin();
        $data = array();
        
        $data['ten_lop'] = $request->classroom_name;
        $data['so_luong'] = $request->classroom_amount;
        $data['id_giangvien'] = $request->lecturer_id;
        $data['id_sinhvien'] = $request->student_id;
        
        //$dulieu = DB::table('nha_cung_cap')->where('tenNcc',$request->brand_product_name)->get();
        $new = $data['ten_lop'];
        $dulieu = DB::table('lop')->where('ten_lop',$request->classroom_name)->value('ten_lop');
        if($new==$dulieu){
            Session::put('message','Lớp học đã tồn tại!');
            return Redirect::to('add-classroom');
        }else{

            DB::table('lop')->insert($data);
            Session::put('message','Thêm lớp học thành công!');
            return Redirect::to('add-classroom');
        }
    }
    
    public function edit_classroom($classroom_id){
        $this->AuthLogin();
        $account_classroom = DB::table('giang_vien')->orderby('id_giangvien','desc')->get();
        $account_student = DB::table('sinh_vien')->orderby('id_sinhvien','desc')->get();
        $edit_classroom = DB::table('lop')->where('id_lop',$classroom_id)->get();
        $manager_classroom = view('admin.edit_classroom')->with('edit_classroom',$edit_classroom)->with('account_classroom',$account_classroom)->with('account_student',$account_student);
        return view('admin_layout')->with('admin.edit_classroom',$manager_classroom);
    }
    public function update_classroom(Request $request,$classroom_id){
       $this->AuthLogin();
        $data = array();
        
        $data['ten_lop'] = $request->classroom_name;
        $data['so_luong'] = $request->classroom_amount;
        $data['id_giangvien'] = $request->lecturer_id;
        $data['id_sinhvien'] = $request->student_id;
        DB::table('lop')->where('id_lop',$classroom_id)->update($data);
        Session::put('message','Cập nhật thông tin thành công!');
        return Redirect::to('all-classroom');
    }
    public function delete_classroom($classroom_id){
        $this->AuthLogin();
        DB::table('lop')->where('id_lop',$classroom_id)->delete();
        Session::put('message','Xóa lớp học thành công!');
        return Redirect::to('all-classroom');
    }

    


}
