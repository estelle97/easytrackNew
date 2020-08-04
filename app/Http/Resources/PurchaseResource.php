<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
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
            'purchase_id' => $this->id,
            'code' => $this->code,
            'status' => $this->status,
            'paying_method' => $this->paying_method,
            'shipping_cost' => $this->shipping_cost,
            'purchase_text' => $this->purchase_text,
            'site' => new SiteResource($this->whenLoaded('site')),
            'supplier' => new SupplierResource($this->whenLoaded('supplier')),
            'initiator' => new UserResource($this->whenLoaded('initiator')),
            'validator' => $this->when(!is_null($this->validator), new UserResource($this->whenLoaded('validator'))),
            'products' => $this->products,
        ];
    }
}
