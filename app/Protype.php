<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protype extends Model
{
    protected $table = 'protypes';

    public function product (){
        return $this->hasMany('App\Product', 'type_id');
    }
}
