<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimAmount extends Model
{
    protected $fillable=[
        'services','marking','transport'
    ];
    public  function unit()
    {
        return $this->belongsTo('App\Unit');

    }
}
