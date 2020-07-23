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
            'username' => $this->username,
            'address' => $this->address,
            'phone' => $this->phone,
            'is_admin' => $this->is_admin,
            'employee' => new EmployeeResource($this->whenLoaded('employee')),
            'companies' => CompanyResource::collection($this->whenLoaded('companies')),
            'agendas' => SiteResource::collection($this->whenLoaded('agendas')),
            'role' => new RoleResource($this->whenLoaded('role')),
            'permissions' => $this->permissions->merge($this->role->permissions)
        ];
    }
}
