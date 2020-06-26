<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   protected $fillable =[
         "name", "description", "is_active"
   ];
    protected $guarded = ['id'];

    public function permissions() {
        return $this->belongsToMany(Permission::class);  
     }
     
     public function users() {
        return $this->belongsToMany('App\User');
     }
}
