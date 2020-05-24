<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ThaoLuan extends Controller
{
	public function dsmonhoc()
	{
		$id_taikhoan= Session::get('admin_id');
        $id_giangvien = DB::table('giang_vien')->where('id_taikhoan', $id_taikhoan)->value('id_giangvien');
        $data = DB::table('lop_monhoc')->where('id_giangvien', $id_giangvien)->get();
		return view('admin.dsmonhoc', compact('data'));
	}

	 public function allnhom($id_lop_mh) {

    	$data = DB::table('nhom')->where('id_lopmonhoc', $id_lop_mh)->get();
    	
    	return view('admin.all_nhomtl',compact('data'));
    }
    public function allthaoluan($id_nhom)
    {
    	$data=DB::table('thao_luan')->where('id_nhom',$id_nhom)->get();
    	//dd($data);


    	return view('admin.all_thaoluan',compact('data'));
    }
    public function listComment($id_thaoluan)
    {

    	$data= DB::table('comment')->where('id_thaoluan',$id_thaoluan)
    			->join('sinh_vien','sinh_vien.id_sinhvien','comment.id_sinhvien')
    			->get();

    	return view('admin.all_comment',compact('data','id_thaoluan'));
    }

    public function postBinhLuan(Request $request,$id_thaoluan)
    {
        // $id_taikhoan= Session::get('admin_id');
        //  $id_giangvien = DB::table('giang_vien')->where('id_taikhoan', $id_taikhoan)->value('id_giangvien');
            
	    
	    return view('admin.all_comment');
    }
}
