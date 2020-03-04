<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {

    $name = [
        'Physiotherapy',
        'Radiology',
        'Radiotherapy',
        'Rheumatology',
        'Sexual Health',
        'Urology',
    ];

    $code  = [
        'Ph',
        'Ra_gy',
        'Ra_py',
        'Rhe',
        'Sh',
        'Ur',
    ];

    return [
        'code' => $faker->randomElement($code),
        'name' => $faker->randomElement($name),

    ];
});
