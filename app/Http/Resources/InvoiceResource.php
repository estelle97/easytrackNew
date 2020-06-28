<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'invoice_id' => $this->id,
            'code ' => $this->code,
            'status' => $this->status,
            'site_id' => $this->site_id,
            'products' => ProductResource::collection($this->whenLoaded('products')),
            'quantity' => $this->whenPivotLoaded('sales', function(){
                return $this->quantity;
            }) 
        ];
    }
}
