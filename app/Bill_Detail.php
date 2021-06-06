<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_Detail extends Model
{
    protected $table = 'bill__details';
    public function bills()
    {
        return $this->belongsTo('App\Bill');
    }
}
