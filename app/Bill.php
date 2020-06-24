<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $grarded = ['id'];


    public function products(){
        return $this->belongsToMany('App\Product','orders')->withPivot('site_id','supplier_id','quantity','status');
    }

}
