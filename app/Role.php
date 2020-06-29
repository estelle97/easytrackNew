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
}
