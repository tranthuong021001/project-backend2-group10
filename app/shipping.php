<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'shipping_name', 'shipping_email','shipping_address','shipping_phone','shipping_note'
    ];
    protected $primaryKey = 'shipping_id';
    protected $table = 'shipping__infos';
}
