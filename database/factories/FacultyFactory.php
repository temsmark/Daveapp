<?php

use Faker\Generator as Faker;

$factory->define(\App\Faculty::class, function (Faker $faker) {
    return [
        'faculty_name'=>$faker->company,
    ];
});
