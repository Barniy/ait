<?php

use App\AttributeExamination;
use Illuminate\Database\Seeder;

class AttributeExaminationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AttributeExamination::class, 9)->create();
    }
}
