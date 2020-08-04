<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function sites(){
        return $this->belongsToMany('App\Site')->withPivot('cost','price','cost','qty','qty_alert', 'promotion', 'promotion_price','promotion_start','promotion_end','tax_method');
    }

    public function activities(){
        return $this->belongsToMany('App\Activity');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function purchases(){
        return $this->belongsToMany('App\Purchase')->withPivot('site_id','qty','cost','damages');
    }

    public function sales(){
        return $this->belongsToMany('App\Sale')->withPivot('site_id','qty','price');
    }

    public function taxe(){
        return $this->belongsTo('App\Taxe');
    }

    public function unit(){
        return $this->belongsTo('App\Unit');
    }
}
