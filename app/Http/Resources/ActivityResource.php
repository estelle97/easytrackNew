<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            'activity_id' => $this->id,
            'code' => $this->code,
            'name' => $this->namespace,
            'companies' => CompanyResource::collection($this->whenLoaded('companies')),
            'products' => ProductResource::collection($this->whenLoaded('products'))
            
        ];
    }
}
