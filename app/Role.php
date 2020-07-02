<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function permissions() {
        return $this->belongsToMany(Permission::class,'permissions_roles');  
     }
     
     public function users() {
        return $this->belongsToMany('App\User');
     }
}
