<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];


    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function site(){
        return $this->belongsTo('App\Site');
    }
}
