<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function department(){
        return $this->hasMany('App\User');
    }
    public function claim(){
        return $this->hasMany('App\Claim');
    }

}
