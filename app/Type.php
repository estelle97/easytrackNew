<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function companies(){
        return $this->belongsToMany('App\Company', 'subscriptions')->withPivot('end_date','status');
    }
}
