<?php

namespace App\Permissions;

use App\Permission;
use App\Role;

trait HasPermissionsTrait {


   public function givePermissionsTo(... $permissions) {

    $permissions = $this->getAllPermissions($permissions);
    if($permissions === null) {
      return $this;
    }
    $this->permissions()->saveMany($permissions);
    return $this;
  }

  public function withdrawPermissionsTo( ... $permissions ) {

    $permissions = $this->getAllPermissions($permissions);
    $this->permissions()->detach($permissions);
    return $this;

  }

  public function refreshPermissions( ... $permissions ) {

    $this->permissions()->detach();
    return $this->givePermissionsTo($permissions);
  }

  public function hasPermissionThroughRole($permission) {

    foreach ($permission->roles as $role){
      if($this->roles->contains($role)) {
        return true;
      }
    }
    return false;
  }

  public function hasRole($role) {

    if ($this->role->name == $role || $this->role->slug == $role) return true;
    return false;
  }

  public function role() {
      return $this->belongsTo(Role::class);
  }


  public function permissions() {
    return $this->belongsToMany(Permission::class);
  }

  public function hasPermission($permission) {
    return (bool) $this->getPermissions()->where('slug', $permission)->count();
  }

  protected function getAllRoles(array $roles){
    return Role::whereIn('slug', $roles)->get();
  }

  public function getPermissions(){
      return $this->permissions->merge($this->role->permissions);
  }

  public function hasPermissionTo(... $permissions){
      foreach($permissions as $perm){
        if($this->may($perm)) return true;
      }
      return false;
  }

  public function may($permission){
    foreach($this->getPermissions() as $perm){
      if($perm->slug == $permission) return true;
    }
    return false;
  }

}
