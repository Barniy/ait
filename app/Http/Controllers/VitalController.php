<?php

namespace App\Http\Controllers;

use App\Http\Resources\VitalResource;
use App\Patient;
use Illuminate\Http\Request;
use App\Models\Patient\Vital;
use Symfony\Component\HttpFoundation\Response;

class VitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vital = Vital::create([
            'patient_id' => $request->patientId,
            'user_id' => $request->userId,
            'blood_pressure' => $request->bloodPressure,
            'per_rectum' => $request->perRectum,
            'respiratory_rate' => $request->respiratoryRate,
            'temperature' => $request->temperature,
            'oxygen_saturation' => $request->oxygenSaturation,
            'weight' => $request->weight,
            'height' => $request->height
        ]);
        return response()->json([
            'data' => $vital,
            'message' => 'vital added successfully',
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::with('vitals')->find($id);

        return response([
            'success' => true,
            'data' =>  VitalResource::collection($patient->vitals)
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vital $vital)
    {
        $vital->update([
            'patient_id' => $request->patientId,
            'user_id' => $request->userId,
            'blood_pressure' => $request->bloodPressure,
            'per_rectum' => $request->perRectum,
            'respiratory_rate' => $request->respiratoryRate,
            'temperature' => $request->temperature,
            'oxygen_saturation' => $request->oxygenSaturation,
            'weight' => $request->weight,
            'height' => $request->height
        ]);
        return response()->json([
            'data' => $vital,
            'message' => 'vital added successfully',
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vital $vital)
    {
        $vital->delete();
        return response(['data' => 'Vital Removed Successfully'], Response::HTTP_OK);
    }
}
