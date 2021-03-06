<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Models\ImagingRequest;
use App\Http\Resources\ImagingRequestResource;
use App\Http\Resources\ImagingRequestsCollection;

class ImagingRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('status') == 'ALL') {
            $labRequest = ImagingRequest::whereIn(
                'status',
                ['PENDING', 'COMPLETED']
            )->orderBy('created_at')->get();
        } else {

            $labRequest = ImagingRequest::where('status', $request->input('status'))->orderBy('created_at')->get();
        }
        return  ImagingRequestsCollection::collection($labRequest);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {


        $patient = Patient::findOrFail($request->input('patientId'));

        return response()->json([
            'data' =>  ImagingRequestResource::collection($patient->imagingRequests),
            'message' => '',
            'success' => true
        ]);
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
