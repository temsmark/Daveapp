<?php

use Faker\Generator as Faker;

$factory->define(\App\ClaimAmount::class, function (Faker $faker) {
    return [
        'unit_id'=>rand(1,60),
        'claim_id'=>rand(1,20),
        'service'=>rand(1000,10000),
        'marking'=>rand(1000,10000),
        'transport'=>rand(1000,10000),

    ];
});
