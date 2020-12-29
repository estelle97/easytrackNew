<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    public function fexpense(){
        return $this->belongsTo('App\Fexpense');
    }
}
