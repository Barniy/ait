<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Patient;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'medical_record_number' => Str::random(10),
        'first_name' => $faker->name,
        'middle_name' => $faker->name,
        'last_name' => $faker->name,
        'gender' => $faker->randomElement(['Female', 'Male']),
        'date_of_birth' => $faker->date,
        'language' => $faker->randomElement(['English', 'Amharic', 'Oromifa', 'Tigregna']),
        'religion' => $faker->randomElement(['Orthodox', 'Protestant', 'Muslim', 'Catholic'])
    ];
});
