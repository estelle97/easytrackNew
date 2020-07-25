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
                        ->withPivot('end_date','status');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }
}
