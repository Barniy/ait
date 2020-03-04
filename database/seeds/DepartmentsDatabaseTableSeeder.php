<?php

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
        factory(App\Models\Department::class, 6)->create();
    }
}
