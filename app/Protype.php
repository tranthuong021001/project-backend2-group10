<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protype extends Model
{
    //
    protected $table = 'protypes';

    public function sanpham (){
        return $this->hasMany('App\SanPham', 'type_id');
    }
    public function product (){
        return $this->hasMany('App\Product', 'type_id');
    }
}
