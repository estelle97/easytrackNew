<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function permissions() {
        return $this->belongsToMany('App\Permission');  
     }
     
     public function users() {
        return $this->hasMany('App\User');
     }
}
