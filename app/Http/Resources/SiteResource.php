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
            'name' => $this->name,
            'slug' => $this->slug,
            'email' => $this->email,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'town' => $this->town,
            'street' => $this->street,
            'employees' => EmployeeResource::collection($this->whenLoaded('employees')),
            'company' => new CompanyResource($this->whenLoaded('company')),
            'suppliers' => SupplierResource::collection($this->whenLoaded('suppliers')),
            'produits' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
