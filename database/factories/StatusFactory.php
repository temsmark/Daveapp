<?php

use Faker\Generator as Faker;

$factory->define(\App\Status::class, function (Faker $faker) {
    static $i=1;
    return [
        'claim_id'=>$i++,
        'user_id'=>$i++,
        'finance'=>rand(1,0),
        'dep_admin'=>rand(1,0),
    ];
});
