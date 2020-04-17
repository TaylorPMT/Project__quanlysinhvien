<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
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
