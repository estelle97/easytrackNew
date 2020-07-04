<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'user_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'username' => $this->username,
            'is_admin' => $this->is_admin,
            'cni_number' => $this->cni_number,
            'contact_tel' => $this->when($this->contact_tel != null, $this->contact_tel),
            'contact_name' => $this->when($this->contact_name != null, $this->contact_name),
            'snack' => SnackResource::collection($this->whenLoaded('snacks')),
            'site' => new SiteResource($this->whenLoaded('site')),
            'agendas' => SiteResource::collection($this->whenLoaded('agendas')),
            'start' => $this->whenPivotLoaded('agendas', function(){
                return $this->pivot->start;
            }),
            'end' => $this->whenPivotLoaded('agendas', function(){
                return $this->pivot->end;
            }),
            'status' => $this->whenPivotLoaded('agendas', function(){
                return $this->pivot->status;
            }),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'permission' => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }
}
