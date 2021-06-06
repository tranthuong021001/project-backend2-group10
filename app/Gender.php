<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';
    public function product(){
        return $this->hasMany('App\Product', 'gender');
    }
}
