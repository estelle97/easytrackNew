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
        return $this->belongsToMany('App\Product')->withPivot('min','purchase_price','selling_price','initial_stock');
    }

    public function suppliers(){
        return $this->hasMany('App\Supplier');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function snack(){
        return $this->belongsTo('App\Snack');
    }

    public function agendas(){
        return $this->belongsToMany('App\User','agendas')->withPivot('status','start','end');
    }
}
