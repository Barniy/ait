<?php

namespace App\Http\Controllers;

use App\Http\Resources\TempPatientResource;
use App\Models\TempPatient;
use Illuminate\Http\Request;

class TempPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  TempPatientResource::collection(TempPatient::all()->sortBy('created_at'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tempPatient = new  TempPatient;
        $tempPatient->first_name = $request->input('firstName');
        $tempPatient->middle_name = $request->input('middleName');
        $tempPatient->last_name = $request->input('lastName');
        $tempPatient->department_id = $request->input('departmentId');
        $tempPatient->user_id = $request->input('userId');
        $tempPatient->save();

        return response()->json([
            'data' => new TempPatientResource($tempPatient),
            'message' => 'patient added to payment queue',
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
