<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'product_name', 'price'
    ];
    protected $primaryKey = 'id';
    protected $table = 'products';
   
  


}
