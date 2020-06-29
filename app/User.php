<?php

namespace App;
use Cache;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens,HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $fillable = [
        'name', 'email', 'password','address', 'username'
    ];

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

    public function snack(){
        return $this->hasOne('App\Snack','snack_id');
    }

    //Check if user is online
    public function isOnline(){
        return Cache::has('user-is-online-'. $this->id);
    }
}
