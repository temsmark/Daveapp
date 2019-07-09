<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function fromy(){
        return $this->belongsTo('App\User','id');
    }
}
