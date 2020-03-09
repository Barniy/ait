<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LabRequestResource extends JsonResource
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
            'specimenType' => $this->specimen_type,
            'LabTests' => $this->lab_tests,
            'priority' => $this->priority,
            'description' => $this->description,
            'status' =>  $this->status,
            'createdAt' => $this->created_at,
            'user' => new UserResource($this->user),
        ];
    }
}
