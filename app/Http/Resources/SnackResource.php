<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SnackResource extends JsonResource
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
            'snack_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'tel1' => $this->tel1,
            'tel2' => $this->tel2,
            'town' => $this->town,
            'street' => $this->street,
            'logo' => $this->logo,
            'sites' => SiteResource::collection($this->whenLoaded('sites')),
        ];
    }
}
