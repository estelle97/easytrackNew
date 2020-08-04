<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'sale_id' => $this->id,
            'code' => $this->code,
            'paying_method' => $this->paying_method,
            'sale_note' => $this->sale_note,
            'seller_note' => $this->seller_note,
            'status' => $this->status,
            'initiator' => new UserResource($this->initiator),
            'validator' => $this->when(!is_null($this->validator_id), new UserResource($this->whenLoaded('validator'))),
            'customer' => new CustomerResource($this->customer),
            'site' => new SiteResource($this->whenLoaded('site')),
            'products' => $this->products
        ];
    }
}
