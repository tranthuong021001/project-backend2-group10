<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_Detail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'bill_id', 'product_id','amount','total_money'
    ];
    protected $primaryKey = 'id';
    protected $table = 'bill__details';
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
