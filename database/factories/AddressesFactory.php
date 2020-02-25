<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'region' => $faker->country,
        'woreda' => $faker->country,
        'kebele' => $faker->country,
        'house_number' => $faker->randomNumber(5),
        'tel_phone_number' => $faker->phoneNumber,
        'mobile_phone_number' => $faker->phoneNumber
    ];
});
