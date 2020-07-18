<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $guarded = ['id'];
    protected $table = 'companies';
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function sites(){
        return $this->hasMany('App\Site');
    }

    public function owner(){
        return $this->belongsTo('App\User');
    }

    public function types(){
        return $this->belongsToMany('App\Type')
                        ->using('App\Subscription')
                        ->withPivot('end_date','status');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }
}
