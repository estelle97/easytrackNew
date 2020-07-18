<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payrool extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function employee(){
        return $this->belongsTo('App\Employee');
    }

    
}
