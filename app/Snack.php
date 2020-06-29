<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    protected $guarded = ['id'];

    public function sites(){
        return $this->hasMany('App\Site');
    }

    public function types(){
        return $this->belongsToMany('App\Type','subscriptions')->withPivot('end_date','status');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
