<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    //
    protected $table = 'manufactures';

    //liên kết đến bảng product
    function product(){
        return $this->hasMany('App\Product', 'manu_id');
    }
}
