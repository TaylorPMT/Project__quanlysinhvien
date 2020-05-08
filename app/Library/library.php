<?php
namespace App\Library;
class library{

    public static function nhom_listid($list)
    {

        foreach($list as $row)
            {
                if($row->id_nhom!=null)
                {
                    $arr[]=$row->id_nhom;

                }
            }
        return $arr;
    }
    public static function ds_thanhvienlop_mh_l_sv($list)
    {
        foreach ($list as $row)
        {
            if($row ->id_sinhvien !=null)
            {
                $arr[]=$row->id_sinhvien;
            }
        }
        return $arr;
    }
    public static function nhom_id_dk($list)
    {
        foreach($list as $row)
        {
            if($row ->id_lop_mh !=null)
            {
                $arr[]=$row->id_lop_mh;
            }
        }
        return $arr;
    }

}

