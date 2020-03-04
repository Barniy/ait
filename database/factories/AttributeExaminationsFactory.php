<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AttributeExamination;
use App\Model;
use Faker\Generator as Faker;

$factory->define(AttributeExamination::class, function (Faker $faker) {
    $name = [
        'Hematology',
        'Clinical Chemistry',
        'Immunoassay',
        'Urinalysis',
        'Miscellaneous',
        'Parasitology',
        'Serology',
        'Microbiology'
    ];



    return [
        'name' => $faker->unique()->word(),
        'code' =>  $faker->languageCode,
        'status' => $faker->boolean(),
    ];
});
