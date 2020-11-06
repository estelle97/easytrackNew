<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function products(){
        return $this->belongsToMany('App\Product')->withPivot('qty','cost','damages');
    }

    public function initiator(){
        return $this->belongsTo('App\User')->withTrashed();
    }

    public function validator(){
        return $this->belongsTo('App\User')->withTrashed();
    }

    public function site(){
        return $this->belongsTo('App\Site')->withTrashed();
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier')->withTrashed();
    }

    public function getTotalOrder(){
        return $this->products;
    }

    public function total($category_id = null){
        $total = 0;

        if(!$category_id){
            foreach($this->products as $prod){
                $total += $prod->pivot->cost * $prod->pivot->qty;
            }
            $total += $this->shipping_cost;
        } else {
            foreach($this->products->where('category_id', $category_id) as $prod){
                if($this->validator_id == null) continue;
                $total += $prod->pivot->cost * $prod->pivot->qty;
            }
            $total += $this->shipping_cost;
        }

        return $total;
    }
}
