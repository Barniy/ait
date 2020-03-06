<?php

use App\Address;
use App\Patient;
use App\EmergencyContact;
use Illuminate\Database\Seeder;

class PatientsDatabaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::unguard();
        factory(Patient::class, 200)->create()->each(function ($patient) {
            $patient->address()->save(factory(Address::class)->make());
            $patient->emergencyContact()->save(factory(EmergencyContact::class)->make());
            $patient->emergencyContact->address()->save(factory(Address::class)->make());
        });
    }
}
