<?php

use Faker\Generator as Faker;

$factory->define(\App\Upload::class, function (Faker $faker) {
    return [
        'user_id'=>rand(1,30),
        'claim_id'=>rand(1,20),
        'upload'=>'tems.pdf',

    ];
});
