<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          $this->call(AttributeExaminationsTableSeeder::class);
        //  $this->call(UsersTableSeeder::class);
        //  $this->call(RoleTableSeeder::class);
        //  $this->call(PatientsDatabaseTableSeeder::class);

    }
}
