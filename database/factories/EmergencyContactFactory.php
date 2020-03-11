<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\EmergencyContact;
use Faker\Generator as Faker;

$factory->define(EmergencyContact::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'middle_name' => $faker->name,
        'last_name' => $faker->name,
    ];
});
