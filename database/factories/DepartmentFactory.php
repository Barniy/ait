<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {

    $name = [
        ['name'=>'Physiotherapy' , 'code' => 'Ph' ],
        ['name'=>'Radiology' , 'code' =>  'Ra_gy' ],
        ['name'=>'Radiotherapy' , 'code' => 'Ra_py' ],
        ['name'=>'Rheumatology' , 'code' => 'Rhe' ],
        ['name'=>'Sexual Health' , 'code' =>  'Sh' ],
        ['name'=>'Urology' , 'code' =>  'Ur'],
    ];

});
