<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'payment_type' => $this->payment_type,
            'status' => $this->status,
            'site_id' => $this->site_id,
            'products' => ProductResource::collection($this->whenLoaded('products')),
            'quantity' => $this->whenPivotLoaded('orders', function(){
                return $this->pivot->quantity;
            }),
            'purchase_price' => $this->whenPivotLoaded('orders', function(){
                return $this->pivot->purchase_price;
            }),
        ];
    }
}
