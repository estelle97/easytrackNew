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
            'bill_id' => $this->id,
            'code' => $this->code,
            'status' => $this->status,
            'paying_method' => $this->paying_method,
            'shipping_cost' => $this->shipping_cost,
            'purchase_text' => $this->purchase_text,
            'site_id' => $this->site_id,
            'initiator' => new UserResource($this->initiator()),
            'validator' => new UserResource($this->validator()),
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
