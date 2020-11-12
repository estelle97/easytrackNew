<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fexpense extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function site(){
        return $this->belongsTo('App\Site');
    }

    public function expenses(){
        return $this->hasMany('App\Expense');
    }
}
