<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsDatabaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'Physiotherapy', 'code' => 'Ph'],
            ['name' => 'Radiology', 'code' =>  'Ra_gy'],
            ['name' => 'Radiotherapy', 'code' => 'Ra_py'],
            ['name' => 'Rheumatology', 'code' => 'Rhe'],
            ['name' => 'Sexual Health', 'code' =>  'Sh'],
            ['name' => 'Urology', 'code' =>  'Ur'],
        ];
foreach ($departments as $department) {
    Department::create($department);
}

    }
}
