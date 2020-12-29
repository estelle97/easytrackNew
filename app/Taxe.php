<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxe extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

}
