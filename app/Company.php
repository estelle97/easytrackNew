<?php

namespace App;

use Carbon\Carbon;
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
                        ->withPivot('end_date','status','is_active','created_at');
    }

    public function activity(){
        return $this->belongsTo('App\Activity');
    }

    public function totalPurchases($days = null, $category_id= null){
        $total = 0;
        if($days){
            foreach ($this->sites as $site) {
               foreach($site->purchases->where('created_at','>=', Carbon::today()->subDays($days))->where('validator_id','!=', null) as $pur){
                $total += $pur->total($category_id);
               }
            }
        }else {
            foreach ($this->sites as $site) {
                foreach($site->purchases->where('validator_id','!=', null) as $pur){
                 $total += $pur->total($category_id);
                }
             }
        }

        return $total;
    }

    public function totalSales($days = null, $category_id = null){
        $total = 0;

        if($days){
            foreach ($this->sites as $site) {
                foreach($site->sales->where('created_at','>=', Carbon::today()->subDays($days))->where('validator_id','!=', null) as $sale){
                 $total += $sale->total($category_id);
                }
             }
        } else {
            foreach ($this->sites as $site) {
               foreach($site->sales->where('validator_id','!=', null) as $sale){
                $total += $sale->total($category_id);
               }
            }
        }

        return $total;
    }

    public function totalProducts(){
        $total = 0;
        foreach ($this->sites as $site) {
            $total += $site->products->count();
        }

        return $total;
    }

    public function totalSuppliers(){
        $total = 0;
        foreach ($this->sites as $site) {
            $total += $site->suppliers->count();
        }

        return $total;
    }

    public function totalCustomers(){
        $total = 0;
        foreach ($this->sites as $site) {
            $total += $site->customers->count();
        }

        return $total;
    }

    public function totalEmployees(){
        $total = 0;
        foreach ($this->sites as $site) {
            $total += $site->employees->count();
        }

        return $total;
    }

    public function subscription(){
        $subDuration = $this->types->last()->duration;
        $subRemainingDays = Carbon::now()->diffInDays($this->types->last()->pivot->end_date, false);
        $totalDuration = 0;
        $totalUsage = 0;
        foreach ($this->types as $key => $pack) {
            $totalDuration += $pack->duration;
            if($key === $this->types->count() -1){
                $totalUsage += ($subDuration - $subRemainingDays);
            } else {
                $totalUsage += $pack->duration;
            }
        }
        
        $subUsedPercentage = round($totalUsage * 100/$totalDuration, 1);
        return (object)[
            'duration' => $subDuration,
            'remainingDays' => $totalDuration - $totalUsage,
            'percentage' => $subUsedPercentage
        ];
    }
}
