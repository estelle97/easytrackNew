<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function products(){
        return $this->belongsToMany('App\Product')->withPivot('cost','price','cost','qty','qty_alert', 'promotion', 'promotion_price','promotion_start','promotion_end','tax_method');
    }

    public function suppliers(){
        return $this->hasMany('App\Supplier');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function employees(){
        return $this->hasOne('App\Employee');
    }

    public function agendas(){
        return $this->belongsToMany('App\User','agendas')->withPivot('status','start','end');
    }
}
