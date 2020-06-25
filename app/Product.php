<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function sites(){
        return $this->belongsToMany('App\Site')->withPivot('min','purchase_price','selling_price','initial_stock');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function bills(){
        return $this->belongsToMany('App\Bill','orders')->withPivot('site_id','supplier_id','quantity','status');
    }

    public function invoices(){
        return $this->belongsToMany('App\Invoice','sales')->withPivot('site_id','quantity');
    }
}
