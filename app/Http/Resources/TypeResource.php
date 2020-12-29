<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
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
            'type_id' => $this->id,
            'title' => $this->title,
            'duration' => $this->duration,
            'price' => $this->price,
            'companies' => CompanyResource::collection($this->whenLoaded('companies'))
        ];
    }
}
