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
            'key' => $this->key,
            'description' => $this->description,
            'type' => $this->type,
            'isChecked' => false,
            'attributeExaminationItems' =>  AttributeExaminationItemResource::collection($this->attributeExaminationItems)
        ];
    }
}
