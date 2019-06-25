<?php

use Faker\Generator as Faker;

$factory->define(\App\Claim::class, function (Faker $faker) {
    return [
        'user_id'=>rand(1,20),
        'dep_admin'=>rand(1,0),
        'finance'=>rand(1,0),
        'director'=>rand(1,0),
        'semester'=>rand(1,4),
        'year'=>date('Y'),
        'faculty_id'=>rand(1,100),
        'department_id'=>rand(1,40),
        'department_admin_id'=>rand(1,30),
        'service'=>rand(1,3),
        'bank'=>$faker->randomElement(['Equity','Kcb','Unaitas','Taifa']),
        'acc_no'=>rand(1000000,10000000),
        'total'=>rand(500,50000),
    ];
});
