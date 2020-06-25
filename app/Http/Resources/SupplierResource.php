<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
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
            'supplier_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'tel1' => $this->tel1,
            'tel2' => $this->tel2,
            'site' => new SiteResource($this->whenLoaded('site'))
        ];
    }
}
