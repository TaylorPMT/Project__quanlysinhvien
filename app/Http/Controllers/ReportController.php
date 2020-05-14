<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phan_hoi;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class ReportController extends Controller
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
    public function reportview(/*$id_giangvien*/) {
         $this->AuthLogin();
         $id_taikhoan= Session::get('admin_id');

         $id_giangviendn= DB::table('giang_vien')->where('id_taikhoan',$id_taikhoan)
         ->get('id_giangvien');
  
        foreach($id_giangviendn as $value) {
          $list_report = phan_hoi::join('sinh_vien','sinh_vien.id_sinhvien','=','phan_hoi.id_sinhvien')->where('id_giangvien',$value->id_giangvien)
        ->get();
        }
        return view('admin.list_report', compact('list_report'));
    }
    
    //public function postReportUn($id_phanhoi) {
       // DB::table('phan_hoi')->where('id_phanhoi', $id_phanhoi)->update(['trang_thai'=>1]);
       // return Redirect::to('/view_report');
   // }
   public function postReportAc($id_phanhoi){
       DB::table('phan_hoi')->where('id_phanhoi', $id_phanhoi)->update(['trang_thai'=>0]);
       return Redirect::to('/view_report');
    }
    public function postReportTo(Request $request) {
      $data =  $request->phanhoi_gv;
      $id = $request->id;
      DB::table('phan_hoi')->where('id_phanhoi', $id)->update(['trang_thai'=>1,'phan_hoigv'=>$data]);
      return Redirect::to('/view_report');
    }
    public function listReport() {
       $this->AuthLogin();
         $id_taikhoan= Session::get('admin_id');

         $id_giangviendn= DB::table('giang_vien')->where('id_taikhoan',$id_taikhoan)
         ->get('id_giangvien');
  
        foreach($id_giangviendn as $value) {
          $list_report = phan_hoi::join('sinh_vien','sinh_vien.id_sinhvien','=','phan_hoi.id_sinhvien')->where('id_giangvien',$value->id_giangvien)
        ->get();
        }
        return view('admin.all_report', compact('list_report'));
    }
}
