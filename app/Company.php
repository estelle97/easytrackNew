<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table = 'companies';
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function sites(){
        return $this->hasMany('App\Site');
    }

    public function owner(){
        return $this->belongsTo('App\User','user_id');
    }

    public function types(){
        return $this->belongsToMany('App\Type','subscriptions')
                        ->withPivot('end_date','status','is_active');
    }

    public function activity(){
        return $this->belongsTo('App\Activity');
    }

    public function totalPurchases(){
        $total = 0;
        foreach ($this->sites as $site) {
           foreach($site->purchases->where('validator_id','!=', null) as $pur){
            $total += $pur->total();
           }
        }
       
        return $total;
    }

    public function totalSales(){
        $total = 0;
        foreach ($this->sites as $site) {
           foreach($site->sales->where('validator_id','!=', null) as $sale){
            $total += $sale->total();
           }
        }
       
        return $total;
    }
}
