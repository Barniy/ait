<?php

namespace App\Http\Controllers;

use App\Address;
use App\Patient;
use App\EmergencyContact;
use Illuminate\Http\Request;
use App\Http\Resources\PatientResource;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return PatientResource::collection(Patient::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('patients::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $patient = new Patient;
        $emergencyContact = new EmergencyContact;
        $patientAddress = new Address;
        $emergencyContactAddress = new Address;

        // patient basic information
        $patient->medical_record_number = $request->patient_medical_record_number;
        $patient->first_name = $request->patient_first_name;
        $patient->middle_name = $request->patient_middle_name;
        $patient->last_name = $request->patient_last_name;
        $patient->gender = $request->patient_gender;
        $patient->date_of_birth = $request->patient_dob;
        $patient->language = $request->patient_language !== null ? $request->patient_language : 'Default';
        $patient->religion = $request->patient_religion;
        $patient->save();

        // patient address
        $patientAddress->region = $request->patient_region;
        $patientAddress->woreda = $request->patient_woreda;
        $patientAddress->kebele = $request->patient_kebele;
        $patientAddress->house_number = $request->patient_house_number;
        $patientAddress->tel_phone_number = $request->patient_Tel;
        $patientAddress->mobile_phone_number = $request->patient_Mobile;
        $patient->address()->save($patientAddress);


        // emergency contact basic information
        $emergencyContact->patient_id = $patient->id;
        $emergencyContact->first_name = $request->emergency_first_name;
        $emergencyContact->middle_name = $request->emergency_middle_name;
        $emergencyContact->last_name = $request->emergency_last_name;
        $emergencyContact->save();

        // emergency contact address
        $emergencyContactAddress->region = $request->emergency_contact_region;
        $emergencyContactAddress->woreda = $request->emergency_contact_woreda;
        $emergencyContactAddress->kebele = $request->emergency_contact_kebele;
        $emergencyContactAddress->house_number = $request->emergency_contact_house_number;
        $emergencyContactAddress->tel_phone_number = $request->emergency_contact_tel;
        $emergencyContactAddress->mobile_phone_number = $request->emergency_contact_mobile;
        $emergencyContact->address()->save($emergencyContactAddress);

        return response()->json([
            'data' => 'patient created successfully'
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('patients::single_patient', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $patient =  Patient::find($id);
        $patientAddress = $patient->address;
        $patientEmergencyContact =   $patient->emergencyContact;
        $emergencyContactAddress = $patientEmergencyContact->address;



        if ($patient->address == null) {
            $patientAddress = [
                "id" => "",
                "addressable_id" => "",
                "addressable_type" => "",
                "region" => "dfdfd",
                "woreda" => "",
                "kebele" => "",
                "house_number" => "",
                "tel_phone_number" => "",
                "mobile_phone_number" => "",
                "created_at" => "",
                "updated_at" => ""
            ];
        }
        if ($patientEmergencyContact->address == null) {
            $emergencyContactAddress = [
                "id" => "",
                "addressable_id" => "",
                "addressable_type" => "",
                "region" => "",
                "woreda" => "",
                "kebele" => "",
                "house_number" => "",
                "tel_phone_number" => "",
                "mobile_phone_number" => "",
                "created_at" => "",
                "updated_at" => ""
            ];
        }

        return view('patients::edit', compact('patient', 'patientAddress', 'patientEmergencyContact', 'emergencyContactAddress'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Patient $patient)
    {

        // patient basic information
        $patient->update([
            'medical_record_number' => $request->patient_medical_record_number,
            'first_name' => $request->patient_first_name,
            'middle_name' => $request->patient_middle_name,
            'last_name' => $request->patient_last_name,
            'gender' => $request->patient_gender,
            'date_of_birth' => $request->patient_dob,
            'language' => $request->patient_language !== null ? $request->patient_language : 'Default',
            'religion' => $request->patient_religion
        ]);
        // patient address
        if (isset($patient->address)) {
            $patient->address->update([
                'addressable_id' => $patient->id,
                'region' => $request->patient_region,
                'woreda' => $request->patient_woreda,
                'kebele' => $request->patient_kebele,
                'house_number' => $request->patient_house_number,
                'tel_phone_number' => $request->patient_Tel,
                'mobile_phone_number' => $request->patient_Mobile,
            ]);
        } else {
            $patientAddress = new Address;
            $patientAddress->region = $request->patient_region;
            $patientAddress->woreda = $request->patient_woreda;
            $patientAddress->kebele = $request->patient_kebele;
            $patientAddress->house_number = $request->patient_house_number;
            $patientAddress->tel_phone_number = $request->patient_Tel;
            $patientAddress->mobile_phone_number = $request->patient_Mobile;
            $patient->address()->save($patientAddress);
        }


        // emergency contact basic information
        if (isset($patient->emergencyContact)) {
            $patient->emergencyContact->update([
                'patient_id' => $patient->id,
                'first_name' => $request->emergency_first_name,
                'middle_name' => $request->emergency_middle_name,
                'last_name' => $request->emergency_last_name,
            ]);
        } else {
            $emergencyContact = new EmergencyContact;
            $emergencyContact->patient_id = $patient->id;
            $emergencyContact->first_name = $request->emergency_first_name;
            $emergencyContact->middle_name = $request->emergency_middle_name;
            $emergencyContact->last_name = $request->emergency_last_name;
            $patientAddress->emergencyContact()->save($emergencyContact);
        }

        // emergency contact address
        if (isset($patient->emergencyContact->address)) {
            $patient->emergencyContact->address->update([
                'region' =>  $request->emergency_contact_region,
                'woreda' =>  $request->emergency_contact_woreda,
                'kebele' => $request->emergency_contact_kebele,
                'house_number' =>  $request->emergency_contact_house_number,
                'tel_phone_number' =>  $request->emergency_contact_tel,
                'mobile_phone_number' =>  $request->emergency_contact_mobile,
            ]);
        } else {

            $emergencyContactAddress = new Address;
            $emergencyContactAddress->region = $request->emergency_contact_region;
            $emergencyContactAddress->woreda = $request->emergency_contact_woreda;
            $emergencyContactAddress->kebele = $request->emergency_contact_kebele;
            $emergencyContactAddress->house_number = $request->emergency_contact_house_number;
            $emergencyContactAddress->tel_phone_number = $request->emergency_contact_tel;
            $emergencyContactAddress->mobile_phone_number = $request->emergency_contact_mobile;
            $patient->emergencyContact->address()->save($emergencyContactAddress);
        }



        return response()->json([
            'data' => 'patient created successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
