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

}

