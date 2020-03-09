<?php

use Illuminate\Database\Seeder;
use App\Models\AttributeConditions;

class AttributeConditionDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $conditions = [
            ['key' => 'Allergies', 'description' => 'Any Known Allergies', 'type' => 'PATIENT_CONDITION'],
            ['key' => 'Weight', 'description' => 'Any Known Allergies', 'type' => 'PATIENT_CONDITION'],
            ['key' => 'Hyperthyroidism', 'description' => 'Hyperthyroidism', 'type' => 'PATIENT_CONDITION'],
            ['key' => 'Intramedullary', 'description' => 'Intramedullary nail?', 'type' => 'PATIENT_CONDITION'],
            ['key' => 'Cardiac Pacemaker', 'description' => 'Cardiac Pacemaker', 'type' => 'PATIENT_CONDITION'],
            ['key' => 'Cardiac Aneurysm clip', 'description' => 'Cardiac Aneurysm clip?', 'type' => 'PATIENT_CONDITION'],
            ['key' => 'Cochlear Implant', 'description' => 'Cochlear Implant?', 'type' => 'PATIENT_CONDITION'],
            ['key' => 'Joint replacement', 'description' => 'Joint replacement?', 'type' => 'PATIENT_CONDITION'],

        ];


        foreach ($conditions as $condition) {
            AttributeConditions::create($condition);
        }
    }
}
