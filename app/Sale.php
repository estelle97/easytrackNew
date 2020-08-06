<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function products(){
        return $this->belongsToMany('App\Product')->withPivot('qty','price');
    }

    public function initiator(){
        return $this->belongsTo('App\User');
    }

    public function validator(){
        return $this->belongsTo('App\User');
    }

    public function site(){
        return $this->belongsTo('App\Site');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

}
