<?php

namespace App\Http\Controllers;

use App\AttributeExamination;
use App\Http\Resources\AttributeExaminationResource;
use Illuminate\Http\Request;

class AttributeExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return  AttributeExaminationResource::collection(AttributeExamination::where('status', $request->type)->get());
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
     * @param  \App\AttributeExamination  $attributeExamination
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeExamination $attributeExamination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttributeExamination  $attributeExamination
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeExamination $attributeExamination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttributeExamination  $attributeExamination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeExamination $attributeExamination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttributeExamination  $attributeExamination
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeExamination $attributeExamination)
    {
        //
    }
}
