<?php

use Faker\Generator as Faker;

$factory->define(\App\Department::class, function (Faker $faker) {
    return [
        'department_name'=>$faker->company,
        'faculty_id'=>rand(1,100),
    ];
});
