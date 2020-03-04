<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PatientCollection extends Resource
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
            'medicalRecordNumber' => $this->medical_record_number,
            'fullName' =>  $this->first_name . $this->middle_name . $this->last_name,
            'firstName' => $this->first_name,
            'middleName' => $this->middle_name,
            'lastName' => $this->last_name,
            'gender' => $this->gender,
            'dateOfBirth' => $this->date_of_birth,
            'language' => $this->language,
            'religion' => $this->religion,
            'address' => new AddressResource($this->address),
            'emergencyContact' => new EmergencyContactResource($this->emergencyContact)
        ];
    }
}
