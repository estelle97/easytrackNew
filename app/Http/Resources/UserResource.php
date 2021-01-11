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
            'phone' => $this->phone,
            'email' => $this->email,
            'username' => $this->username,
            'address' => $this->address,
            'phone' => $this->phone,
            'is_admin' => $this->is_admin,
            'companies' => $this->when($this->is_admin == 2, $this->companies),
            'employee' => $this->when($this->employee != null, new EmployeeResource($this->whenLoaded('employee'))),
            'agendas' => SiteResource::collection($this->whenLoaded('agendas')),
            'role' => new RoleResource($this->whenLoaded('role')),
            'permissions' => $this->getPermissions(),
        ];
    }
}
