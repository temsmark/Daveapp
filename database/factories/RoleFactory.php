<?php

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
        static $i = 1;
        return [
            'role_id' => $i++,
            'role_name' =>$faker->unique()->randomElement(['System Admin','Finance','Chairman','user','Director'])
        ];
});
