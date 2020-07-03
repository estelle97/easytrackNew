<?php

namespace App;
use Cache;
use App\Permission;
use App\Role;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens,HasPermissionsTrait;
    use \HighIdeas\UsersOnline\Traits\UsersOnlineTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function site(){
        return $this->belongsTo('App\Site');
    }

    public function agendas(){
        return $this->belongsToMany('App\Site','agendas')->withPivot('status','start','end');
    }
    public function isActive()
    {
        return $this->is_active;
    }

    public function snacks(){
        return $this->hasMany('App\Snack');
    }

    //Check if user is online
    public function isOnline(){
        return Cache::has('user-is-online-'. $this->id);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_user');
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
