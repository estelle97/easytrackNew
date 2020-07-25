<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'brand' => $this->brand,
            'description' => $this->description,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'sites' => SiteResource::collection($this->whenLoaded('sites')),
        ];
    }
}
