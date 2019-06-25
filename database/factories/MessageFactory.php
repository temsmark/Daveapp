<?php

use Faker\Generator as Faker;

$factory->define(\App\Message::class, function (Faker $faker) {
    static $i=1;
    return [
        'status_id'=>rand(1,25),
        'claim_id'=>rand(1,25),
        'user_id'=>rand(1,30),
        'role_id'=>rand(1,4),
        'department_id'=>rand(1,50),
        'message'=>$faker->paragraph(3),
    ];
});
