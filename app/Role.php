<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['role_name','role_id'];


    public function role(){
      return  $this->hasMany('App\User');
    }

public function roleClaim(){
    return   $this->belongsTo('App\Claim');
}
}
