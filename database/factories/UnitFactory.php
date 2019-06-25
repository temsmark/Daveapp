<?php

use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'unit_name'=>'JKU-'.''.$faker->sentence(10),
        'department_id'=>rand(1,40),
    ];
});
