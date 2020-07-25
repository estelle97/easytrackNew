<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table = 'activities';
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function companies(){
        return $this->hasMany('App\Company');
    }

    public function products(){
        return $this->belongsToMany('App\Products');
    }
}
