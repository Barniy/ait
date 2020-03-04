<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmergencyContactResource extends JsonResource
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
            'firstName' =>  $this->first_name,
            'middleName' =>  $this->middle_name,
            'lastName' => $this->last_name,
            'address' => new AddressResource($this->address),
        ];
    }
}
