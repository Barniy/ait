<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'guardName' => $this->guard_name,
        ];

        $additionalData = [
            'permissions' => $this->permissions,
        ];

        return array_merge($defaultData, $additionalData);
    }
}
