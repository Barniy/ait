<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Language;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Language::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Amharic', 'English', 'Oromifa']),
        'code' => $faker->languageCode
    ];
});
