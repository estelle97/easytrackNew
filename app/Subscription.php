<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];
}
