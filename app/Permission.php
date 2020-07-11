<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
   use SoftDeletes;

   protected $guarded = ['id'];
   public $timestamps = null;
   protected $dates = ['created_at'];

   public function roles() {
      return $this->belongsToMany('App\Role');  
   }
   
   public function users() {
      return $this->belongsToMany(User::class);
   }
}
