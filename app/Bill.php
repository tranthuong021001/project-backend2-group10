<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    public function bill__details(){
        return $this->hasMany('App\Bill_Detail', 'bill_id');
    }
}
