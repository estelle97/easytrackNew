<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function snacks(){
        return $this->belongsToMany('App\Snack','subscriptions')->withPivot('end_date','status');
    }
}
