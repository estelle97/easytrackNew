<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table = 'categories';
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function parent(){
        return $this->belongsTo('App\Category','id','id');
    }

    public function sons(){
        return $this->hasMany('App\Category','id','id');
    }
}
