<?php
namespace App\Library;
class library{

    public static function list_id($list ,$id,$arr)
    {
        foreach($list as $row)
        {
            if($row->id ==$id)

            {
                  $arr[]=$row->id;
                  library::list_id($list,$id,$arr);
            }


        }
        return $arr;
    }

}
