<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TempPatientResource extends JsonResource
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
            'firstName' => $this->first_name,
            'middleName' => $this->middle_name,
            'lastName' => $this->last_name,
            'fullName' => $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name,
            'created_at' => $this->created_at->diffForHumans(),
            'updatedAt' => $this->updated_at->diffForHumans(),
            'department' => new DepartmentResource($this->department),
            'user' => new UserResource($this->user),
        ];
    }
}
