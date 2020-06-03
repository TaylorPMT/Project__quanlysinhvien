<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ClasssubjectManagement extends Controller
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
    public function add_classsub(){
        $this->AuthLogin();
        
        $account_classsub = DB::table('mon_hoc')->orderby('id_monhoc','desc')->get();
        $account_classsublec = DB::table('giang_vien')->orderby('id_giangvien','desc')->get();
        return view('admin.add_classsub')->with('account_classsub',$account_classsub)->with('account_classsublec',$account_classsublec);
    }
    public function all_classsub(){
        $this->AuthLogin();
        $admin_id=Session::get('admin_id');
        $giangvienId = DB::table('giang_vien')->where('id_taikhoan','=',$admin_id)->value('id_giangvien');
        $dem = $all_classsub = DB::table('lop_monhoc')->where('lop_monhoc.id_giangvien','=',$giangvienId)
        ->join('mon_hoc','mon_hoc.id_monhoc','=','lop_monhoc.id_monhoc')
        ->join('giang_vien','giang_vien.id_giangvien','=','lop_monhoc.id_giangvien')
        ->join('ds_thanhvienlop_mh','lop_monhoc.id_lop_mh','=','ds_thanhvienlop_mh.id_lopmonhoc')
        ->select('ds_thanhvienlop_mh.id_lopmonhoc','lop_monhoc.id_lop_mh')
        ->orderby('lop_monhoc.id_lop_mh','desc')->get()->toArray();
        
        
        $all_classsub = DB::table('lop_monhoc')->where('lop_monhoc.id_giangvien','=',$giangvienId)
        ->join('mon_hoc','mon_hoc.id_monhoc','=','lop_monhoc.id_monhoc')
        ->join('giang_vien','giang_vien.id_giangvien','=','lop_monhoc.id_giangvien')

        ->orderby('lop_monhoc.id_lop_mh','desc')->get();

        $manager_classsub = view('admin.all_classsub')->with('all_classsub',$all_classsub)->with('dem',$dem);
        return view('admin_layout')->with('admin.all_classsub',$manager_classsub);
    }
    public function save_classsub(Request $request){
        $this->AuthLogin();
        $admin_id=Session::get('admin_id');
        $giangvienId = DB::table('giang_vien')->where('id_taikhoan','=',$admin_id)->value('id_giangvien');
        $data = array();
        
        $data['ten_lop_mh'] = $request->classsub_name;
        //$data['soluong'] = $request->classsub_amount;
        $data['Ngay_bd'] = $request->classsub_start;
        $data['Ngay_kt'] = $request->classsub_end;
        $data['id_monhoc'] = $request->subject_id;
        $data['id_giangvien'] = $giangvienId;
        
        //$dulieu = DB::table('nha_cung_cap')->where('tenNcc',$request->brand_product_name)->get();
        $new = $data['ten_lop_mh'];
        $dulieu = DB::table('lop_monhoc')->where('ten_lop_mh',$request->classsub_name)->value('ten_lop_mh');
        if($new==$dulieu){
            Session::put('message','Lớp môn học đã tồn tại!');
            return Redirect::to('add-classsub');
        }else{

            DB::table('lop_monhoc')->insert($data);
            Session::put('message','Thêm lớp môn học thành công!');
            return Redirect::to('add-classsub');
        }
    }
    
    public function edit_classsub($classsub_id){
        $this->AuthLogin();
        $account_classsublec = DB::table('giang_vien')->orderby('id_giangvien','desc')->get();
        $account_classsub = DB::table('mon_hoc')->orderby('id_monhoc','desc')->get();
        $edit_classsub = DB::table('lop_monhoc')->where('id_lop_mh',$classsub_id)->get();
        $manager_classsub = view('admin.edit_classsub')->with('edit_classsub',$edit_classsub)->with('account_classsub',$account_classsub)->with('account_classsublec',$account_classsublec);
        return view('admin_layout')->with('admin.edit_classsub',$manager_classsub);
    }
    public function update_classsub(Request $request,$classsub_id){
       $this->AuthLogin();
       $admin_id=Session::get('admin_id');
        $giangvienId = DB::table('giang_vien')->where('id_taikhoan','=',$admin_id)->value('id_giangvien');
        $data = array();
        
        $data['ten_lop_mh'] = $request->classsub_name;
        //$data['soluong'] = $request->classsub_amount;
        $data['Ngay_bd'] = $request->classsub_start;
        $data['Ngay_kt'] = $request->classsub_end;
        $data['id_monhoc'] = $request->subject_id;
        $data['id_giangvien'] = $giangvienId;
        DB::table('lop_monhoc')->where('id_lop_mh',$classsub_id)->update($data);
        Session::put('message','Cập nhật thông tin thành công!');
        return Redirect::to('all-classsub');
    }
    public function delete_classsub($classsub_id){
        $this->AuthLogin();
        DB::table('lop_monhoc')->where('id_lop_mh',$classsub_id)->delete();
        Session::put('message','Xóa lớp môn học thành công!');
        return Redirect::to('all-classsub');
    }

    


}
