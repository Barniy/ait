<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'region' =>  $this->region,
            'woreda' =>  $this->woreda,
            'kebele' => $this->kebele,
            'houseNumber' =>  $this->house_number,
            'telPhoneNumber' =>  $this->tel_phone_number,
            'mobilePhoneNumber' =>  $this->mobile_phone_number
        ];
    }
}
