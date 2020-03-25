<?php

namespace App\Http\Controllers\Patient;



use App\Queue;
use App\Address;
use App\Patient;
use App\EmergencyContact;
use App\Models\Department;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\PatientDepartment;
use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource;
use App\Http\Resources\LabRequestResource;
use App\Http\Resources\ImagingRequestResource;
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

    public function searchPatient(Request $request)
    {
        $results = (new Search())
            ->registerModel(Patient::class, ['first_name', 'middle_name', 'last_name', 'medical_record_number'])
            ->registerModel(Address::class, 'mobile_phone_number', 'tel_phone_number')
            ->search($request->input('query'));
        return response()->json($results);
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
        $patient->medical_record_number = $request->input('medicalRecordNumber');
        $patient->first_name = $request->input('firstName');
        $patient->middle_name = $request->input('middleName');
        $patient->last_name = $request->input('lastName');
        $patient->gender = $request->input('gender');
        $patient->date_of_birth = $request->input('dateOfBirth');
        $patient->language = $request->input('language.name');
        $patient->religion = $request->input('religion');
        $patient->save();

        // patient address
        $patientAddress->region = $request->input('address.region');
        $patientAddress->woreda = $request->input('address.woreda');
        $patientAddress->kebele = $request->input('address.kebele');
        $patientAddress->house_number = $request->input('address.houseNumber');
        $patientAddress->tel_phone_number = $request->input('address.telPhoneNumber');
        $patientAddress->mobile_phone_number = $request->input('address.mobilePhoneNumber');
        $patient->address()->save($patientAddress);


        // emergency contact basic information
        $emergencyContact->patient_id = $patient->id;
        $emergencyContact->first_name = $request->input('emergencyContact.firstName');
        $emergencyContact->middle_name = $request->input('emergencyContact.middleName');
        $emergencyContact->last_name = $request->input('emergencyContact.lastName');
        $emergencyContact->save();

        // emergency contact address
        $emergencyContactAddress->region = $request->input('emergencyContact.address.region');
        $emergencyContactAddress->woreda = $request->input('emergencyContact.address.woreda');
        $emergencyContactAddress->kebele = $request->input('emergencyContact.address.kebele');
        $emergencyContactAddress->house_number = $request->input('emergencyContact.address.houseNumber');
        $emergencyContactAddress->tel_phone_number = $request->input('emergencyContact.address.telPhoneNumber');
        $emergencyContactAddress->mobile_phone_number = $request->input('emergencyContact.address.mobilePhoneNumber');
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
            'medical_record_number' => $request->input('medicalRecordNumber'),
            'first_name' => $request->input('firstName'),
            'middle_name' => $request->input('middleName'),
            'last_name' => $request->input('lastName'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('dateOfBirth'),
            'language' => $request->input('language.name'),
            'religion' => $request->input('religion'),
        ]);
        // patient address
        if (isset($patient->address)) {
            $patient->address->update([
                'region' => $request->input('address.region'),
                'woreda' => $request->input('address.woreda'),
                'kebele' => $request->input('address.kebele'),
                'house_number' => $request->input('address.houseNumber'),
                'tel_phone_number' => $request->input('address.telPhoneNumber'),
                'mobile_phone_number' => $request->input('address.mobilePhoneNumber'),
            ]);
        } else {
            $patientAddress = new Address;
            $patientAddress->region = $request->input('address.region');
            $patientAddress->woreda = $request->input('address.woreda');
            $patientAddress->kebele = $request->input('address.kebele');
            $patientAddress->house_number = $request->input('address.houseNumber');
            $patientAddress->tel_phone_number = $request->input('address.telPhoneNumber');
            $patientAddress->mobile_phone_number = $request->input('address.mobilePhoneNumber');
            $patient->address()->save($patientAddress);
        }


        // emergency contact basic information
        if (isset($patient->emergencyContact)) {
            $patient->emergencyContact->update([
                'patient_id' => $patient->id,
                'first_name' => $request->input('emergencyContact.firstName'),
                'middle_name' => $request->input('emergencyContact.middleName'),
                'last_name' => $request->input('emergencyContact.lastName'),
            ]);
        } else {
            $emergencyContact = new EmergencyContact;
            $emergencyContact->patient_id = $patient->id;
            $emergencyContact->first_name = $request->input('emergencyContact.firstName');
            $emergencyContact->middle_name = $request->input('emergencyContact.middleName');
            $emergencyContact->last_name = $request->input('emergencyContact.lastName');
            $patientAddress->emergencyContact()->save($emergencyContact);
        }

        // emergency contact address
        if (isset($patient->emergencyContact->address)) {

            $patient->emergencyContact->address->update([
                'region' => $request->input('emergencyContact.address.region'),
                'woreda' => $request->input('emergencyContact.address.woreda'),
                'kebele' => $request->input('emergencyContact.address.kebele'),
                'house_number' => $request->input('emergencyContact.address.houseNumber'),
                'tel_phone_number' =>  $request->input('emergencyContact.address.telPhoneNumber'),
                'mobile_phone_number' =>   $request->input('emergencyContact.address.mobilePhoneNumber'),
            ]);
        } else {

            $emergencyContactAddress = new Address;
            $emergencyContactAddress->region = $request->input('emergencyContact.address.region');
            $emergencyContactAddress->woreda = $request->input('emergencyContact.address.woreda');
            $emergencyContactAddress->kebele = $request->input('emergencyContact.address.kebele');
            $emergencyContactAddress->house_number = $request->input('emergencyContact.address.houseNumber');
            $emergencyContactAddress->tel_phone_number = $request->input('emergencyContact.address.telPhoneNumber');
            $emergencyContactAddress->mobile_phone_number = $request->input('emergencyContact.address.mobilePhoneNumber');
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
        // find patient
        $patient = Patient::findOrFail($request->patientId);

        // add to lab request 
        $patient->labRequests()->create([
            'specimen_type' => $request->specimentType,
            'lab_tests' => $request->labTests,
            'priority' => $request->priority,
            'user_id' => $request->userId,
            'description' =>  $request->description,
            'status' => $request->status,
        ]);

        // add to payment queue
        $queue = new Queue;
        $queue->patient_id = $request->patientId;
        $queue->user_id = $request->userId;
        $queue->type = "LABREQUEST";
        $queue->save();


        return response()->json([
            'data' => LabRequestResource::collection($patient->labRequests),
            'message' => 'lab request added successfully and added to Queue',
            'success' => true
        ]);
    }

    public function addImagingRequest(Request $request)
    {

        // find patient 
        $patient = Patient::findOrFail($request->input('patientId'));

        // add imaging request to Imaging 
        $patient->imagingRequests()->create([
            'provisional_diagnosis' => $request->input('provisionalDiagnosis'),
            'clinical_information' => $request->input('clinicalInformation'),
            'patient_condition' => $request->input('patientConditions'),
            'examination_requested' => $request->input('examinationRequested'),
            'user_id' => $request->input('userId'),
            'description' =>  $request->input('description'),
            'status' => $request->input('status')
        ]);

        // add to payment queue
        $queue = new Queue;
        $queue->patient_id = $request->patientId;
        $queue->user_id = $request->userId;
        $queue->type = "IMAGINGREQUEST";
        $queue->save();

        return response()->json([
            'data' =>  ImagingRequestResource::collection($patient->imagingRequests),
            'message' => 'Imaging request added successfully and added to Queue',
            'success' => true
        ]);
    }
}
