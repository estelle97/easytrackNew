<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function types(){
        return $this->belongsToMany('App\Type')
                        ->using('App\Subscription');
    }
}
