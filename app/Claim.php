<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
public function getServiceAttribute($value){
    if($value==1){
        return "Teaching";
    }elseif ($value==2){
        return "Technical";

    }else{
        return "Technical Support";


    }

}

    public function claim(){
        return $this->belongsTo('App\Department','id');
    }
    public  function faculty()
    {
        return $this->belongsTo('App\Faculty');

    }
    public function status(){
        return $this->hasMany('App\Status','user_id');
    }

    public function roleClaim(){
        return  $this->hasMany('App\Claim');
    }
    public function userclaim()
    {
        return $this->hasOne('App\User','id');

    }

}
