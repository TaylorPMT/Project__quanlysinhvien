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
        $list_report = phan_hoi::join('sinh_vien','sinh_vien.id_sinhvien','=','phan_hoi.id_sinhvien')
        
        ->where('phan_hoi.id_giangvien',/*$id_giangvien*/ 1)
        ->get();
        // dd($list_report);
        return view('admin.list_report', compact('list_report'));
       /* $list = DB::table('giang_vien')->where('id_giangvien',$id_giangvien);
      
        ->join('sinh_vien','sinh_vien.id_sinhvien','=','phan_hoi.id_sinhvien')
        
        ->get();
        
        $manager_report = view('admin.list_report')->with('list', $list);
        return view('admin_layout')->with('admin.list_report',$manager_report);*/
    }
    
    //public function postReportUn($id_phanhoi) {
       // DB::table('phan_hoi')->where('id_phanhoi', $id_phanhoi)->update(['trang_thai'=>1]);
       // return Redirect::to('/view_report');
   // }
   public function postReportAc($id_phanhoi){
       DB::table('phan_hoi')->where('id_phanhoi', $id_phanhoi)->update(['trang_thai'=>0]);
       return Redirect::to('/view_report');
    }
}
