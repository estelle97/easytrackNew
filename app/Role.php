<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   protected $fillable =[
      "is_active", "name", "slug", "description"
   ];
    protected $guarded = ['id'];

    public function permissions() {
        return $this->belongsToMany(Permission::class,'permissions_roles');  
     }
     
     public function users() {
        return $this->belongsToMany('App\User');
     }

     // Check that if a user has a particular role
    public function hasRole(...$roles)
    {
       // dd($roles);

        foreach($roles as $role)
        {
            if($this->roles->contains('name',$role))
            {
                return true;
            }
        }
        return false;
    }

    // Check that if a user has a particular permission
    public function hasPermission($permission)
    {
        return $this->hasPermissionThroughRole($permission) || (bool) $this->permissions->where('name',$permission->name)->count();
    }

    // Check that if permission THROUGH roles
    public function hasPermissionThroughRole($permission)
    {
        foreach($permission->roles as $role)
        {
            if($this->roles->contains($role))
            {
                return true;
            }
        }
        return false;
    }

    public function givePermission(...$permission)
    {
        $permissions = $this->getPermissions(array_flatten($permission));
        if($permissions === null)
        {
            return $this;
        }  
        $this->permissions()->saveMany($permissions);
        return $this; 
    }
    public function getPermissions(array $permissions)
    {
        return Permission::whereIn('name',$permissions)->get();
    }

    // Remove permission
    public function removePermission(...$permission)
    {
        $permissions = $this->getPermissions(array_flatten($permission));
        $this->permissions()->detach($permissions);
        return $this;
    }

    // Modify permission
    public function modifyPermission(...$permissions)
    {
        $this->permissions()->detach();
        return $this->givePermission($permissions);
    }
}
