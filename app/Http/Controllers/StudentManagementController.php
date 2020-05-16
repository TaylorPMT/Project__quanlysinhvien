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
        $lop_monhoc = DB::table('lop_monhoc')->get();
        $account_product = DB::table('tai_khoan')->orderby('id','desc')->get();
        return view('admin.add_student')->with('account_product',$account_product)->with('lop_monhoc', $lop_monhoc);
    }
    public function all_student(){
        $this->AuthLogin();
        $admin_id=Session::get('admin_id');
        $giangvienId = DB::table('giang_vien')->where('id_taikhoan','=',$admin_id)->value('id_giangvien');
        $all_student = DB::table('lop_monhoc')->where('id_giangvien','=',$giangvienId)->get();

        
        $manager_student = view('admin.all_student')->with('all_student',$all_student);
        return view('admin_layout')->with('admin.all_student',$manager_student);
    }
    public function save_student(Request $request){
        $this->AuthLogin();
        $data = array();
        
        $data['ten_sinhvien'] = $request->student_name;
        $data['gioi_tinh'] = $request->student_sex;
        $data['dia_chi'] = $request->student_address;
        $data['sdt'] = $request->student_phone;
        $data['trang_thai'] = $request->student_status;
        $data['id_taikhoan'] = $request->student_cate;
        $lop['id_lopmonhoc'] = $request->student_class;
        //$dulieu = DB::table('nha_cung_cap')->where('tenNcc',$request->brand_product_name)->get();
        $new = $data['ten_sinhvien'];
        $dulieu = DB::table('sinh_vien')->where('ten_sinhvien',$request->student_name)->value('ten_sinhvien');
        if($new==$dulieu){
            Session::put('message','Sinh viên đã tồn tại!');
            return Redirect::to('add-student');
        }else{

            DB::table('sinh_vien')->insert($data);
            Session::put('message','Thêm sinh viên thành công!');
            $lop['id_sinhvien'] = DB::table('sinh_vien')->orderby('id_sinhvien','desc')->value('id_sinhvien');
            DB::table('ds_thanhvienlop_mh')->insert($lop);
            return Redirect::to('add-student');
        }
    }
    public function unactive_student($student_id){
        $this->AuthLogin();
        DB::table('sinh_vien')->where('id_sinhvien',$student_id)->update(['trang_thai'=>1]);
        $id_lop = DB::table('ds_thanhvienlop_mh')->where('id_sinhvien',$student_id)->value('id_lopmonhoc');
        Session::put('message','Kích hoạt sinh viên thành công!');
        return Redirect::to('danhsach/'.$id_lop);
       
    }
    public function active_student($student_id){
        $this->AuthLogin();
        DB::table('sinh_vien')->where('id_sinhvien',$student_id)->update(['trang_thai'=>0]);
        $id_lop = DB::table('ds_thanhvienlop_mh')->where('id_sinhvien',$student_id)->value('id_lopmonhoc');
        Session::put('message_ac','Không kích hoạt sinh viên thành công!');
        return Redirect::to('danhsach/'.$id_lop);

    }
    public function edit_student($student_id){
        $this->AuthLogin();
        $account_product = DB::table('tai_khoan')->orderby('id','desc')->get();
        $edit_student = DB::table('sinh_vien')->where('id_sinhvien',$student_id)->get();
        $manager_student = view('admin.edit_student')->with('edit_student',$edit_student)->with('account_product',$account_product);
        return view('admin_layout')->with('admin.edit_student',$manager_student);
    }
    public function update_student(Request $request,$student_id){
       $this->AuthLogin();
        $data = array();
        $data['ma_sinhvien'] = $request->student_ma;
        $data['ten_sinhvien'] = $request->student_name;
        $data['gioi_tinh'] = $request->student_sex;
        $data['dia_chi'] = $request->student_address;
        $data['sdt'] = $request->student_phone;
        $data['trang_thai'] = $request->student_status;
        $data['id_taikhoan'] = $request->student_cate;
        DB::table('sinh_vien')->where('id_sinhvien',$student_id)->update($data);
        $id_lop = DB::table('ds_thanhvienlop_mh')->where('id_sinhvien',$student_id)->value('id_lopmonhoc');
        Session::put('message','Cập nhật thông tin thành công!');
       return Redirect::to('danhsach/'.$id_lop);

       
        //return Redirect()->route('danhsach',['id_lopmh'=>4]);
    }
    public function delete_student($student_id){
        $this->AuthLogin();
        DB::table('sinh_vien')->where('id_sinhvien',$student_id)->delete();
        DB::table('ds_thanhvienlop_mh')->where('id_sinhvien', $student_id)->count();

        Session::put('message','Xóa sinh viên thành công!');
        return Redirect::to('all-student');
    }

    public function danhsach($id_lopmonhoc)
    {
      
        $l_ds_thanhvien=DB::table('ds_thanhvienlop_mh')->where('id_lopmonhoc','=',$id_lopmonhoc)
        ->join('sinh_vien','sinh_vien.id_sinhvien','=','ds_thanhvienlop_mh.id_sinhvien')
        ->join('tai_khoan','tai_khoan.id','=','sinh_vien.id_taikhoan')
        ->select('ds_thanhvienlop_mh.*','sinh_vien.*','tai_khoan.*')->get();
        $id=$id_lopmonhoc;
        return view('admin.danhsach',compact('l_ds_thanhvien','id'));
    }
    public function view_search($id) {
        $data = DB::table('sinh_vien')->get(['id_sinhvien','ma_sinhvien']);
        // dd($data);
        return view('admin.all_search_student')->with('data', $data)->with('id', $id);
    }
    public function addToClass($id, $id_student) {
        $data = array();
        $data['id_lopmonhoc'] = $id;
        $data['id_sinhvien'] = $id_student;
        $newSinhvien = $data['id_sinhvien'];
        $sinhvien = DB::table('ds_thanhvienlop_mh')->where('id_sinhvien', $id_student)->value('id_sinhvien');
        if($sinhvien == $newSinhvien) {
            Session::put('message','SV đã tồn tại!');
            return Redirect::to('all-search-student/'.$id);
        } else {
            DB::table('ds_thanhvienlop_mh')->insert($data);
            Session::put('message','Thêm SV thành công!');
            return Redirect::to('danhsach/'.$id);
        }
    }
    public function search(Request $request){

        $keywords = $request->maSV;
        $id = $request->id_class;
        $data = DB::table('sinh_vien')->where('ma_sinhvien','like','%'.$keywords.'%')->get(['id_sinhvien','ma_sinhvien']);
        // dd($data);
         return view('admin.all_search_student')->with('data', $data)->with('id', $id);
    }
}
