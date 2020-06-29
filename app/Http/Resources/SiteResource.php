<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
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
            'site_id' => $this->id,
            'email' => $this->email,
            'tel1' => $this->tel1,
            'tel2' => $this->tel2,
            'town' => $this->town,
            'street' => $this->street,
            'users' => UserResource::collection($this->whenLoaded('users')),
            'snack' => new SnackResource($this->whenLoaded('snack')),
            'suppliers' => SupplierResource::collection($this->whenLoaded('suppliers')),
            'produits' => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
