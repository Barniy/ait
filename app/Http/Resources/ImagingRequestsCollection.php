<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ImagingRequestsCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provisionalDiagnosis' => $this->provisional_diagnosis,
            'clinicalInformation' => $this->clinical_information,
            'patientCondition' => $this->patient_condition,
            'requestedExaminations' => $this->examination_requested,
            'description' => $this->description,
            'status' =>  $this->status,
            'createdAt' => $this->created_at,
            'user' => new UserResource($this->user),
            'patient' => new PatientCollection($this->patient)
        ];
    }
}
