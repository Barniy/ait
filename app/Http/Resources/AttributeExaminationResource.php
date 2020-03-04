<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeExaminationResource extends JsonResource
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
            'key' => $this->code,
            'description' => $this->name,
            'status' => $this->status,
            'attributeExaminationItems' =>  AttributeExaminationItemResource::collection($this->attributeExaminationItems)
        ];
    }
}
