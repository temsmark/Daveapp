<?php

use Faker\Generator as Faker;

$factory->define(App\Voucher::class, function (Faker $faker) {
    static $i=1,$b=1000;
    return [
        "Voucher_id"=>"JKUAT-".$i++.'-'.$b++,
        "user_id"=>rand(1,5),
        "claim_id"=>rand(1,10),
        "amount"=>rand(1000,90000),
        "status"=>rand(0,1),
        "alert"=>rand(0,1)



    ];
});
