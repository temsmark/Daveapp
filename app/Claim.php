<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{

    protected $fillable=[
        'dep_admin','finance','director','dean'
    ];

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
        return $this->belongsTo('App\Department','department_id');
    }
    public  function faculty()
    {
        return $this->belongsTo('App\Faculty','faculty_id');

    }
    public function status(){
        return $this->hasMany('App\Status','user_id');
    }

    public function userclaim()
    {
        return $this->hasOne('App\User','id','user_id');

    }

}
