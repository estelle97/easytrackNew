<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id'];

    public function products(){
        return $this->belongsToMany('App\Product','sales')->withPivot('site_id','quantity');
    }
}
