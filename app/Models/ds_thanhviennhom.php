<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ds_thanhviennhom extends Model
{
    //
    protected $table='ds_thanhviennhom';
    protected $fillable=['id_nhom'];
    const UPDATED_AT = null;

    const CREATED_AT=null;
    protected $primaryKey = 'id_nhom';


}
