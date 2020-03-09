<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AttributeExaminationItemResource extends Resource
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
            'parent' =>   $this->AttributeExamination->key
        ];
    }
}
