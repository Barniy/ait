<?php

use Illuminate\Database\Seeder;

class LanguageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Language::class, 3)->create();
    }
}
