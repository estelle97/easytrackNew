<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function products(){
        return $this->belongsToMany('App\Product')->withPivot('qty','price');
    }

    public function initiator(){
        return $this->belongsTo('App\User');
    }

    public function validator(){
        return $this->belongsTo('App\User');
    }

    
    public function site(){
        return $this->belongsTo('App\Site');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function total($category_id = null){
        $total = 0;
        
        if(!$category_id){
            foreach($this->products as $prod){
                $total += $prod->pivot->price * $prod->pivot->qty;
            }
            $total += $this->shipping_cost;
        } else {
            foreach($this->products->where('category_id', $category_id) as $prod){
                if($this->validator_id == null) continue;
                $total += $prod->pivot->price * $prod->pivot->qty;
            }
            $total += $this->shipping_cost;
        }

        return $total;
    }

    

}
