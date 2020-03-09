<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ImagingRequestResource extends Resource
{
    /**
     * Transform the resource into an array.
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
            'examinationRequested' => $this->examination_requested,
            'user' => new UserResource($this->user),
            'description' => $this->description,
            'status' =>  $this->status
        ];
    }
}
