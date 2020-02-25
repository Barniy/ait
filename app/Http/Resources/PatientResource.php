<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Mockery\Undefined;

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
        $defaultData = [
            'medical_record_number' => $this->medical_record_number,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'date_of_birth' => $this->dob,
            'language' => $this->language,
            'religion' => $this->religion
        ];
        $additionalData = [
            // 'address' => $this->address != null ? $this->address : null,
            'EmergencyContact' => $this->emergencyContact,
            // 'EmergencyContactAddress' => $this->emergencyContact->address != null ? $this->emergencyContact->address : null ,
        ];




        return array_merge($defaultData, $additionalData);
    }
}
