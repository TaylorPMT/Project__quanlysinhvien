<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\lop_monhoc;
use Illuminate\Http\Request;
use App\Models\ds_thanhvienlop_mh;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Library\ds_lopmh;
use App\Models\ds_thanhviennhom;
use App\Models\nhom;
use App\Library\library;
use Carbon\Carbon;

class Update extends Controller
{
    //
    function dang_ky()
    {
       $list_lopMonHoc=lop_monhoc::join('mon_hoc','lop_monhoc.id_monhoc','=','mon_hoc.id_monhoc')->select('mon_hoc.so_tiet','mon_hoc.so_tinchi','lop_monhoc.ten_lop_mh','lop_monhoc.soluong','lop_monhoc.Ngay_bd','lop_monhoc.id_lop_mh')->orderBy('Ngay_bd', 'ASC')->get();
       $id_sv=Auth::user()->id;

       $id_dk=ds_thanhvienlop_mh::where('id_sinhvien','=',$id_sv)->get();
        foreach($id_dk as $item)
        {
            $arr[]=$item->id_lopmonhoc;
        }



        return view('Frontend.dang_ky',compact('list_lopMonHoc','arr'));
    }
    function post_dang_ky(Request $request)
    {    $id_sv=Auth::user()->id;
        $id_request=$request->input('id_lop_monhoc');

       // $id_dk=ds_thanhvienlop_mh::where(['id_sinhvien','=',$id_sv])->whereNotIn('id_lop_monhoc',$id_request)->get();
       // dd($id_dk);
       $list_dsthanhvienlop_mh=ds_thanhvienlop_mh::where('id_sinhvien','=',$id_sv)->first();
       if($list_dsthanhvienlop_mh !=null)
       {
           if($id_request !=null)
           {
                    foreach ($id_request as $value) {
                        $row_ds_thanhvienlop_mh=new ds_thanhvienlop_mh;
                        $row_ds_thanhvienlop_mh->id_lopmonhoc=$value;
                        $row_ds_thanhvienlop_mh->id_sinhvien=$id_sv;
                        $row_ds_thanhvienlop_mh->save();
                    }


                if($id_request ==null)
                {
                    return redirect()->back()->with("message",["type"=>"danger","msg"=>"Vui Lòng Chọn Lớp "]);
                }
                else
                {
                    return redirect()->back()->with("message",["type"=>"success","msg"=>"Đã Chọn Lớp  "]);
                }
           }else
           {
                 return redirect()->back()->with("message",["type"=>"success","msg"=>"Đã Chọn Lớp  "]);
           }
        }
        else
        {

            foreach ($id_request as $value) {
                $row_ds_thanhvienlop_mh=new ds_thanhvienlop_mh;
                $row_ds_thanhvienlop_mh->id_lopmonhoc=$value;
                $row_ds_thanhvienlop_mh->id_sinhvien=$id_sv;
                $row_ds_thanhvienlop_mh->save();
            }



                return redirect()->back()->with("message",["type"=>"success","msg"=>"Chọn Lớp Thành Công  "]);

        }
    }
    // thời khóa biểu
    function thoi_khoa_bieu()
    {
        $id_sv=Auth::user()->id;
        $list_thoikhoabieu=ds_thanhvienlop_mh::where('ds_thanhvienlop_mh.id_sinhvien','=',$id_sv)
        ->join('lop_monhoc','ds_thanhvienlop_mh.id_lopmonhoc','=','lop_monhoc.id_lop_mh')->get();

        $list_dk_nhom=ds_thanhvienlop_mh::where('ds_thanhvienlop_mh.id_sinhvien','=',$id_sv)
        ->join('lop_monhoc','ds_thanhvienlop_mh.id_lopmonhoc','=','lop_monhoc.id_lop_mh')
        ->join('nhom','lop_monhoc.id_lop_mh','=','nhom.id_lopmonhoc')
        ->first();
       





        return view('Frontend.thoi_khoa_bieu',compact('list_thoikhoabieu','list_dk_nhom'));

    }
    function getRequest($id,$id_monhoc)
    {
            $id_sv=Auth::user()->id;
            $id_nhom=$id;

            $l_nhom=nhom::where('id_lopmonhoc','=',$id_nhom)->get();
            $l_ds_nhomdk=ds_thanhviennhom::where('id_sinhvien','=',$id_sv)->get();
            $nhom_listid=library::nhom_listid($l_ds_nhomdk);

            $output = "<table class='table'>";
            $output.=" <thead>
            <tr>
              <th scope='col'>Đăng Ký</th>
              <th scope='col'>Tên Nhóm</th>
              <th scope='col'>Số Lượng</th>
              <th scope='col'></th>

            </tr>
          </thead>";
            foreach($l_nhom as $item)
            {   if(in_array($item->id_nhom,$nhom_listid,true))
                {

                $output .= "<tr>

                     <td>  <input type='checkbox' class='checkbox' disabled  checked></td>
                    <td> $item->ten_nhom </td>
                    <td>  $item->so_luong  </td>
                    <td>   <a href='nhom/$item->id_nhom/$id_monhoc'></a> </td>
                    </tr>";
                }
                else
                {
                    $output .= "<tr>

                    <td>  <input type='checkbox' class='checkbox' disabled ></td>
                   <td> $item->ten_nhom </td>
                   <td>  $item->so_luong  </td>
                   <td>   <a href='nhom/$item->id_nhom/$id_monhoc'>Đổi Nhóm</a> </td>
                   </tr>";
                }
            }

            $output.="</table>";
            $output.="


            ";
            return Response($output);

    }
    function chon_nhom($id_group,$id_monhoc)
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
            return redirect()->Route('thoi_khoa_bieu')->with("message",["type"=>"danger","msg"=>"Nhóm Đã Đủ Số Lượng  "]);
        }else
        {
            if($id_monhocdk==$id_monhoc)
            {
                $save=ds_thanhviennhom::where('id_nhom','=',$id_dsdangky)->first();

                $save->id_nhom=$id_nhom;
                $save->id_sinhvien=$id_sinhvien;

                if($save->save()==true)
                {
                    $row_ds_thanhviennhom= new ds_thanhviennhom;
                    $row_ds_thanhviennhom->id_nhom=$id_nhom;

                    $row_ds_thanhviennhom->id_sinhvien=$id_sinhvien;
                    $list_nhom->so_luong=$soluongnhom-1;
                    $list_nhom->save();

                    return redirect()->Route('thoi_khoa_bieu')->with("message",["type"=>"success","msg"=>"Một yêu cầu chuyển nhóm được gửi đến GV  "]);

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
                    return redirect()->Route('thoi_khoa_bieu')->with("message",["type"=>"success","msg"=>"Bạn Đã Chọn Nhóm Này  "]);
                }
                else{
                    echo "false";
                }
            }
         }





    }
}
