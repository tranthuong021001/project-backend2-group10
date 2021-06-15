<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'product_name', 'price','type_id','type_name','description','sale','sie','gender','image'
    ];
    protected $primaryKey = 'id';
    protected $table = 'products';
   
  


}
