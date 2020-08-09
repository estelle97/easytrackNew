<?php

namespace App;
use Cache;
use App\Permission;
use App\Role;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens,HasPermissionsTrait, SoftDeletes;
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


    public function agendas(){
        return $this->belongsToMany('App\Site','agendas')->withPivot('status','start','end');
    }
    public function isActive()
    {
        return $this->active;
    }

    public function companies(){
        return $this->hasMany('App\Company');
    }

    //Check if user is online
    public function isOnline(){
        return Cache::has('user-is-online-'. $this->id);
    }

    public function employee(){
        return $this->hasOne('App\Employee');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_user');
    }
}
