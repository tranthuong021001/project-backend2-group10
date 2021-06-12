<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    public $timestamps = false;

    public function product_image()
        {
            return $this->hasMany('App\Product_Image', 'product_id');
        }
    public function protype()
    {
        return $this->belongsTo('App\Protype');
    }
    // public function rating()
    // {
    //     return $this->belongsTo('App\Rating', 'product_id');
    // }
    public function rating(){
        return $this->hasMany('App\Rating', 'product_id');
    }

}
