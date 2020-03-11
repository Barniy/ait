<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LabRequestsCollection extends Resource
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
            'specimenType' => $this->specimen_type,
            'LabTests' => $this->lab_tests,
            'priority' => $this->priority,
            'description' => $this->description,
            'status' =>  $this->status,
            'createdAt' => $this->created_at,
            'user' => new UserResource($this->user),
            'patient' => new PatientCollection($this->patient)
        ];
    }
}
