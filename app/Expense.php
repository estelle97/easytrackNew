<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function expense_category(){
        return $this->belongsTo('App\Expense_category');
    }

    public function sites(){
        return $this->hasMany('App\Site');
    }
}
