<?php

use App\Models\AttributeExamination;
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
        $examinations = [
            // dummy data for lab test
            ['Key' => 'Hematology', 'description' => 'Hematology', 'type' => 'LABTEST',],
            ['Key' => 'ClinicalChemistry', 'description' => 'Clinical Chemistry', 'type' => 'LABTEST'],
            ['Key' => 'Immunoassay', 'description' => 'Immunoassay', 'type' => 'LABTEST'],
            ['Key' => 'FertilityHormones', 'description' => 'Fertility/Hormones', 'type' => 'LABTEST'],
            ['Key' => 'InfectiousDisease', 'description' => 'Infectious Disease', 'type' => 'LABTEST'],
            ['Key' => 'Urinalysis', 'description' => 'Urinalysis', 'type' => 'LABTEST'],
            ['Key' => 'Miscellaneous', 'description' => 'Miscellaneous', 'type' => 'LABTEST'],
            ['Key' => 'Parasitology', 'description' => 'Parasitology', 'type' => 'LABTEST'],
            ['Key' => 'Serology', 'description' => 'Serology', 'type' => 'LABTEST'],
            ['Key' => 'MicroBiology', 'description' => 'Micro Biology', 'type' => 'LABTEST'],

            // dummy data for Specimen type
            ['Key' => 'PeripheralBlood', 'description' => 'Peripheral Blood', 'type' => 'Specimen'],
            ['Key' => 'Urine', 'description' => 'Urine', 'type' => 'Specimen'],
            ['Key' => 'Stool', 'description' => 'Stool', 'type' => 'Specimen'],
            ['Key' => 'Body Fluid', 'description' => 'Body Fluid (Specify Type)', 'type' => 'Specimen'],
            ['Key' => 'Amniocentesis', 'description' => 'Amniocentesis', 'type' => 'Specimen'],
            ['Key' => 'BoneMarrowAspirate', 'description' => 'Bone Marrow Aspirate', 'type' => 'Specimen'],
            ['Key' => 'ChorionicVillus', 'description' => 'Chorionic Villus', 'type' => 'Specimen'],
            ['Key' => 'TissueBiopsy', 'description' => 'Tissue Biopsy (Specify type and site)', 'type' => 'Specimen'],

            // dummy data for imaging type
            ['Key' => 'X-Ray', 'description' => 'X-Ray', 'type' => 'imaging'],
            ['Key' => 'CTScan', 'description' => 'CT Scan', 'type' => 'imaging'],
            ['Key' => 'Ultrasound', 'description' => 'Ultrasound', 'type' => 'imaging'],
            ['Key' => 'Mammography', 'description' => 'Mammography', 'type' => 'imaging'],
            ['Key' => 'Fluoroscopy', 'description' => 'Fluoroscopy', 'type' => 'imaging'],
            ['Key' => 'Angiography', 'description' => 'Angiography', 'type' => 'imaging'],
            ['Key' => 'MRI', 'description' => 'MRI', 'type' => 'imaging'],

        ];

        foreach ($examinations as $examination) {
            AttributeExamination::create($examination);
        }
    }
}
