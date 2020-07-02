<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function roles() {
        return $this->belongsToMany('App\Role','permissions_roles');  
     }
     
     public function users() {
        return $this->belongsToMany(User::class);
     }
}
