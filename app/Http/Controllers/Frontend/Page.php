<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\ds_thanhviennhom;
use App\Models\lop_monhoc;
use App\Models\mon_hoc;
use App\Models\nhom;
use App\Models\sinh_vien;
use App\Library\library;
use Illuminate\Http\Request;
use App\Http\Requests\Request\contactRequest;
use App\Models\phan_hoi;

class Page extends Controller
{
    //trang chủ
    function home__Page()
    {
        return view('frontend.home');
    }
    //Đăng Nhập Sinh Viên

    function loginStudent()
    {
        return view('frontend.loginstudent');
    }
    function postloginStudent(Request $request)
    {

        $username=$request->username;
        $password=$request->password;
      $data=['name'=>$username,'password'=>$password,'access'=>1];
      if(Auth::attempt($data))
      {
            $id_taikhoan=Auth::user()->id;
            $sql_query=sinh_vien::where('id_taikhoan','=',$id_taikhoan)->first();
            $ten_sinh_vien=$sql_query->ten_sinhvien;
            $request->session()->put('ten_sinh_vien',$ten_sinh_vien);
       return redirect()->route('dashboard');
      }
      else
      {

          return redirect()->route('loginStudent')->with('msg','Đăng Nhập Thất Bại');
      }


    }
    function dashboard()
    {
        return view('frontend.dashboard');
    }
    // view trang đăng ký

    function registrationStudent()
    {
        $list_mon_hoc=mon_hoc::get();

        return view('frontend.registration',compact('list_mon_hoc'));
    }
    function logout(Request $request)
    {
        if(Auth::check())
        {
         Auth::logout();
        $request->session()->flush();
        }

        return redirect()->route('loginStudent');
    }
    function course_registration($id_courser)
    {

        $list_lopmonhoc=lop_monhoc::where('lop_monhoc.id_monhoc','=',$id_courser)
        ->join("mon_hoc","lop_monhoc.id_monhoc","=","mon_hoc.id_monhoc")
        ->join("nhom","lop_monhoc.id_lop_mh","=","nhom.id_lopmonhoc")
        ->join("giang_day","lop_monhoc.id_lop_mh","=","giang_day.id_lopmonhoc")
        ->join("giang_vien","giang_day.id_giangvien","=","giang_vien.id_giangvien")
        ->select('lop_monhoc.*','mon_hoc.ten_monhoc as tenmonhoc','nhom.ten_nhom as ten_nhom','nhom.id_nhom as id_nhom',"giang_vien.ten_giangvien as ten_giang_vien","giang_day.*","mon_hoc.id_monhoc as id_monhoc","nhom.so_luong as soluongnhom")->orderBy('id_nhom','desc')->get();


        $nhom_da_dangky=ds_thanhviennhom::join("nhom","nhom.id_nhom","=","ds_thanhviennhom.id_nhom")->select('nhom.id_nhom as id_nhom_dk')->get();

        $monHocYeuCau=mon_hoc::where('id_monhoc','=',$id_courser)->get();


        return view('frontend.course_registration',compact('list_lopmonhoc','nhom_da_dangky','monHocYeuCau'));


    }
    function registration_group($id_group,$id_monhoc)
    {
        $id_nhom=$id_group;
        $id_sinhvien=Auth::user()->id;
        $id_dsdangky=ds_thanhviennhom::where('id_sinhvien','=',$id_sinhvien)->get('id_nhom')->toArray();
        $id_monhocdk=nhom::whereIn('nhom.id_nhom',$id_dsdangky)
        ->join('lop_monhoc','nhom.id_lopmonhoc','=','lop_monhoc.id_lop_mh')->value('id_monhoc');
        $list_nhom=nhom::find($id_group);
        $soluongnhom=$list_nhom->so_luong;

        if($soluongnhom ==0)
        {
            return redirect()->back()->with("message",["type"=>"success","msg"=>"Nhóm Đã Đủ Số Lượng  "]);
        }else
        {
            if($id_monhocdk==$id_monhoc)
            {
                $save=ds_thanhviennhom::where('id_nhom','=',$id_dsdangky)->first();

                $save->id_nhom=$id_nhom;
                $save->id_sinhvien=$id_sinhvien;

                if($save->save()==true)
                {

                return redirect()->back()->with("message",["type"=>"success","msg"=>"Một yêu cầu chuyển nhóm được gửi đến GV  "]);

                }



            }else
            {

                $row_ds_thanhviennhom= new ds_thanhviennhom;
                $row_ds_thanhviennhom->id_nhom=$id_nhom;

                $row_ds_thanhviennhom->id_sinhvien=$id_sinhvien;

                if($row_ds_thanhviennhom->save()==true)
                {
                    $list_nhom->so_luong=$soluongnhom-1;
                    $list_nhom->save();
                    return redirect()->back()->with("message",["type"=>"success","msg"=>"Các nhóm được tạo  "]);
                }
                else{
                    echo "false";
                }
            }
         }





    }
    // view xem nhóm đã đăng ký
    function view_registrationGroup()
    {
        $id_sinhvien=Auth::user()->id;
        $list_dsmonhoc=ds_thanhviennhom::where('id_sinhvien','=',$id_sinhvien)->get('id_nhom');

        $nhom_listid=library::nhom_listid($list_dsmonhoc);
         $list_nhomdk=nhom::whereIn('nhom.id_nhom',$nhom_listid)
         ->join("lop_monhoc","nhom.id_lopmonhoc","=","lop_monhoc.id_lop_mh")
         ->join("giang_day","lop_monhoc.id_lop_mh","=","giang_day.id_lopmonhoc")
         ->join("giang_vien","giang_day.id_giangvien","=","giang_vien.id_giangvien")
         ->join("mon_hoc","mon_hoc.id_monhoc","=","lop_monhoc.id_monhoc")
         ->select("nhom.*","lop_monhoc.*","mon_hoc.*","giang_vien.ten_giangvien as ten_giangvien","giang_day.lich_day as ngay")->get();









        return view('frontend.view_registrationGroup',compact('list_nhomdk'));
    }
    function create_group()
    {
       return view('frontend.create_group');
    }
    function post_create_group(Request $request)
    {
        $monHocYeuCau=$request->id_monhoc;
        $id_sinhvien=Auth::user()->id;
        $monHocYeuCau=$request->id_monhoc;
        $MonHoc=mon_hoc::find($monHocYeuCau);
        $tenMonHoc=$MonHoc->ten_monhoc;

        $listPhanHoi=phan_hoi::where('id_sinhvien','=',$id_sinhvien)->get('noi_dung');
        $noiDung="Yêu cầu mở lớp ".$tenMonHoc;
       foreach($listPhanHoi as $item)
       {
        if($item->noi_dung==$noiDung)
        {
            return redirect()->back()->with("message",["type"=>"danger","msg"=>"".$noiDung ." Đã Được Gửi Xin Chờ Xác Nhận Giảng Viên !!!!"]);
        }
     }
            $row_yc=new phan_hoi;
            $row_yc->noi_dung=$noiDung;

            $row_yc->id_sinhvien=$id_sinhvien;
            $row_yc->save();
            return redirect()->back()->with("message",["type"=>"success","msg"=>"Một yêu cầu tạo nhóm được gửi đến GV  "]);

    }
    //view_contact
    function view_contact()
    {
        $id_sinhvien=Auth::user()->id;
        $list_contact=phan_hoi::where('id_sinhvien','=',$id_sinhvien)->get();
        return view('frontend.view_contact',compact('list_contact'));
    }

}
