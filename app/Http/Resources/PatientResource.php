<?php

namespace App\Http\Resources;

use Mockery\Undefined;
use App\Http\Resources\EmergencyContactResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'medicalRecordNumber' => $this->medical_record_number,
            'fullName' =>  $this->first_name .' '. $this->middle_name .' '. $this->last_name,
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
