<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];


    public function products(){
        return $this->belongsToMany('App\Product','orders')->withPivot('site_id','supplier_id','quantity','status');
    }

}
