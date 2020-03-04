<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

class VitalResource extends JsonResource
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
            'bloodPressure' => $this->blood_pressure,
            'perRectum' => $this->per_rectum,
            'respiratoryRate' => $this->respiratory_rate,
            'temperature' => $this->temperature,
            'oxygenSaturation' => $this->oxygen_saturation,
            'weight' => $this->weight,
            'height' => $this->height,
            'user' => new UserResource($this->user),
        ];
    }
}
