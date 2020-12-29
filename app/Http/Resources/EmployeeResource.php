<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'employee_id' => $this->id,
            'cni_number' => $this->cni_number,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'user' => new UserResource($this->whenLoaded('user')),
            'site' => new SiteResource($this->whenLoaded('site')),
        ];
    }
}
