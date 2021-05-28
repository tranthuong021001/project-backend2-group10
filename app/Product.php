<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    public $timestamps = false;

    //lấy thông tin sản phẩm
    // public function infos()
    // {
    //     return $this->hasOne('App\Info', 'product_id', 'id');
    // }
    public function product_image()
        {
            return $this->hasMany('App\Product_Image', 'product_id');
        }
    public function protype()
    {
        return $this->belongsTo('App\Protype');
    }

}
