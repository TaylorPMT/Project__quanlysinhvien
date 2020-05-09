<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
session_start();

class AdminController extends Controller
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
    public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $this->validate($request,
        [
        'admin_email' => 'bail|required|email',
        'admin_password' => 'bail|required|min:6|max:15|',
        ],
        [
          'admin_email.required'=>'Tài khoản email không được để trống!',
          'admin_email.email'=>'Tài khoản không đúng định dạng!',
          'admin_password.required'=>'Mật khẩu không được để trống!',
          'admin_password.min'=>'Mật khẩu phải ít nhất 6 ký tự!',
          'admin_password.max'=>'Mật khẩu nhiều nhất 15 ký tự!',
        ]);
        
    	$admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $admin_access = 2;


    	$result = DB::table('tai_khoan')->where('email',$admin_email)->where('password',$admin_password)->where('access',$admin_access)->first();
    	if ($result){
    		Session::put('admin_name',$result->name);
    		Session::put('admin_id',$result->id);
    		return Redirect::to('/dashboard');
    	}else{
    		Session::put('message','Tài khoản hoặc mật khẩu không đúng!');
    		return Redirect::to('/admin');
    	}
    }
    public function logout(){
        $this->AuthLogin();
    	Session::put('admin_name',null);
    	Session::put('admin_id',null);
    	return Redirect::to('/admin');
    }
}
