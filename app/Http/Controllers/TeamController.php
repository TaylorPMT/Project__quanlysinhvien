<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    public function listLopMonHoc() {
        $id_taikhoan= Session::get('admin_id');
        $id_giangvien = DB::table('giang_vien')->where('id_taikhoan', $id_taikhoan)->value('id_giangvien');
        $data = DB::table('lop_monhoc')->where('id_giangvien', $id_giangvien)->get();
        return view('admin.list_monhoc')->with('data', $data);
    }
    public function listNhom($id_lop_mh) {
    	$data = DB::table('nhom')->where('id_lopmonhoc', $id_lop_mh)->get();
    	return view('admin.list_nhom')->with('data', $data);
    }
    public function xoaNhom($id_nhom) {
    	DB::table('nhom')->where('id_nhom', $id_nhom)->delete();
    	return Redirect::to('/list-lop-mon-hoc');
    }
    public function addNhom() {
    	$id_taikhoan= Session::get('admin_id');
    	$id_giangvien = DB::table('giang_vien')->where('id_taikhoan', $id_taikhoan)->value('id_giangvien');
        $data = DB::table('lop_monhoc')->where('id_giangvien', $id_giangvien)->get();
    	return view('admin.add_nhom')->with('lop_monhoc', $data);
    }
    public function postAddNhom(Request $request) {
    	$data = array();
    	$data['ten_nhom'] = $request->tenNhom;
    	$data['so_luong'] = $request->quantity;
    	$data['id_lopmonhoc'] = $request->monhoc;
    	$data['trang_thai'] = 1;
    	$new = $data['ten_nhom'];
        $dulieu = DB::table('nhom')->where('ten_nhom',$request->tenNhom)->value('ten_nhom');
        if($new==$dulieu){
            Session::put('message','Nhóm đã tồn tại!');
            return Redirect::to('/add-nhom');
        }else{

            DB::table('nhom')->insert($data);
            Session::put('message','Thêm lớp học thành công!');
            return Redirect::to('/add-nhom');
        }
    }
    public function editNhom($id_nhom) {
    	$data = DB::table('nhom')->where('id_nhom', $id_nhom)->get();
    	return view('admin.edit_nhom')->with('data', $data);
    }
    public function update($id_nhom,Request $request) {
    	$id_taikhoan= Session::get('admin_id');
        $id_giangvien = DB::table('giang_vien')->where('id_taikhoan', $id_taikhoan)->value('id_giangvien');
        $id = DB::table('lop_monhoc')->where('id_giangvien', $id_giangvien)->value('id_lop_mh');
    	$tenNhom = $request->tenNhom;
    	$soLuong = $request->quantity;
    	$new = $tenNhom;
    	$dulieu = DB::table('nhom')->where('ten_nhom',$request->tenNhom)->value('ten_nhom');
        if($new==$dulieu){
            Session::put('message','Nhóm đã tồn tại!');
            return Redirect::to('/edit-nhom/'.$id_nhom);
        }else{
	    	DB::table('nhom')->where('id_nhom', $id_nhom)->update(['ten_nhom'=>$tenNhom, 'so_luong'=>$soLuong]);
            Session::put('message','Sửa thành công thành công!');
            return Redirect::to('/nhom/'.$id);
        }
    }
    public function timkiem()
    {
        return view('admin.tim_kiem');
    }
    public function getSearch(Request $req)
    {
        $data= DB::table('sinh_vien')->where('ten_sinhvien','like','%'.$req->key.'%')
            ->orWhere('ma_sinhvien',$req->key)
            ->get();
            //dd($timkiem);
            return view('admin.tim_kiem',compact('data'));

    }
  public function thanhviennhom($id_nhom)
  {

    $dulieu=DB::table('ds_thanhviennhom')->where('id_nhom',$id_nhom)
            ->join('sinh_vien','sinh_vien.id_sinhvien','ds_thanhviennhom.id_sinhvien')

            ->get(); 
    return view('admin.thanhviennhom',compact('dulieu'));
  }
}
