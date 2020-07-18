<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense_category extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $table = "expense_categories";
    protected $dates = ['created_at'];

    public function expenses(){
        return $this->hasMany('App\Expenses');
    }
}
