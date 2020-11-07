<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function sales(){
        return $this->hasMany('App\Site');
    }

    public function site(){
        return $this->belongsTo('App\Site');
    }
}
