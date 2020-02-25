<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return  [
        'name' => $faker->randomElement([
            'admin',
            'nurse',
            'accountant',
            'doctor',
            'patient'
        ]),
        'guard_name' => 'api',
    ];
});
