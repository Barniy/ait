<?php

namespace App\Http\Controllers\Patient;



use Illuminate\Http\Request;
use App\Address;
use App\Patient;
use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource;
use App\EmergencyContact;
use App\Models\Department;
use App\Models\PatientDepartment;
use Symfony\Component\HttpFoundation\Response;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = $request->perPage;
        return PatientResource::collection(Patient::paginate($perPage));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    /**
     * @SWG\Get(
     *     path="/create",
     *     description="Return a user's first and last name",
     *     @SWG\Parameter(
     *         name="firstname",
     *         in="query",
     *         type="string",
     *         description="Your first name",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="lastname",
     *         in="query",
     *         type="string",
     *         description="Your last name",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
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
            'data' => new PatientResource($patient),
            'message' => 'patient created successfully'
        ], Response::HTTP_CREATED);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Patient $patient)
    {

        return new PatientResource($patient);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
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
            'data' => new PatientResource($patient),
            'message' => 'patient updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Patient::deletePatient($id);
        return response()->json([
            'success' => true
        ]);
    }

    public function addPatientToDepartment(Request $request)
    {
        $patient = Patient::find($request->patientId);
        $patient->departments()->syncWithOutDetaching([$request->departmentId => [
            'user_id' => $request->userId
        ]]);
        return response()->json([
            'data' => $patient->departments,
            'message' => 'patient added successfully',
            'success' => true
        ]);
    }

    public function addLabRequest(Request $request)
    {
        $patient = Patient::findOrFail($request->patientId);

        $patient->labRequests()->create([
            'user_id' => $request->userId,
            'description' =>  $request->description,
        ]);

        return response()->json([
            'data' => $patient->labRequests,
            'message' => 'lab request added successfully',
            'success' => true
        ]);
    }

    public function addImagingRequest(Request $request)
    {
        $patient = Patient::findOrFail($request->patientId);

        $patient->imagingRequests()->create([
            'user_id' => $request->userId,
            'description' =>  $request->description,
        ]);

        return response()->json([
            'data' => $patient->imagingRequests,
            'message' => 'Imaging request added successfully',
            'success' => true
        ]);
    }
}
