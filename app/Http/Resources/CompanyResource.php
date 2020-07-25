<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'company_id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'email' => $this->email,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'town' => $this->town,
            'street' => $this->street,
            'logo' => $this->logo,
            'owner' => new UserResource($this->whenLoaded('owner')),
            'sites' => SiteResource::collection($this->whenLoaded('sites')),
            'types' => TypeResource::collection($this->whenLoaded('types')),
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
