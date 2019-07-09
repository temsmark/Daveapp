<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected  $fillable=[
        'message','claim_id','department_id','status_id','user_id','status'

    ];

    public function role(){
       return  $this->belongsTo('App\Role');
    }

}
