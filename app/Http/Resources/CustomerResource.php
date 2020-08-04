<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'customer_id' => $this->id,
            'name' => $this->when(!is_null($this->name), $this->name),
            'customer_name' => $this->when(!is_null($this->customer_name), $this->customer_name),
            'email' => $this->when(!is_null($this->email), $this->email),
            'phone' => $this->when(!is_null($this->phone), $this->phone),
            'town' => $this->when(!is_null($this->town), $this->town),
            'street' => $this->when(!is_null($this->street), $this->street),
            'site' => new SiteResource($this->whenLoaded('site')),
        ];
    }
}
