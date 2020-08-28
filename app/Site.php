<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function products(){
        return $this->belongsToMany('App\Product')->withPivot('taxe_id','cost','price','cost','qty','qty_alert', 'promotion', 'promotion_price','promotion_start','promotion_end','tax_method');
    }

    public function suppliers(){
        return $this->hasMany('App\Supplier');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function employees(){
        return $this->hasMany('App\Employee');
    }

    public function customers(){
        return $this->hasMany('App\Customer');
    }

    public function agendas(){
        return $this->belongsToMany('App\User','agendas')->withPivot('status','start','end');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase');
    }

    public function sales(){
        return $this->hasMany('App\Sale');
    }

    public function allSales($day = null){
        
        $total = 0;
        if($day){
            foreach($this->sales->where('created_at', Carbon::today())->where('validator_id','!=', null) as $sale){
                $total += $sale->total();
            }    
        } else {
            foreach($this->sales->where('validator_id','!=', null) as $sale){
                $total += $sale->total();
            }
        }

        return $total;
    }

    public function allPurchases($day = null){
        
        $total = 0;
        if($day){
            foreach($this->purchases->where('created_at', Carbon::today())->where('validator_id','!=', null) as $pur){
                $total += $pur->total();
            }
        } else{
            foreach($this->purchases->where('validator_id','!=', null) as $pur){
                $total += $pur->total();
            }
        }

        return $total;
    }

    public function totalSales($days = null, $category_id = null){
        $total = 0;
        if($days){
            foreach($this->sales->where('created_at','>', Carbon::today()->subDays($days))->where('validator_id','!=', null) as $sale){
                $total += $sale->total($category_id);
            }
        } else {
            foreach($this->sales->where('validator_id','!=', null) as $sale){
                $total += $sale->total($category_id);
            }
        }

        return $total;
    }

    public function totalPurchases($days = null, $category_id = null){
        $total = 0;
        if($days){
            foreach($this->purchases->where('created_at','>', Carbon::today()->subDays($days))->where('validator_id','!=', null) as $purchase){
                $total += $purchase->total($category_id);
            }    
        } else {
            foreach($this->purchases->where('validator_id','!=', null) as $purchase){
                $total += $purchase->total($category_id);
            }
        }

        return $total;
    }

}
