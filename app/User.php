<?php

namespace App;
use Cache;
use App\Permission;
use App\Role;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens,HasPermissionsTrait, SoftDeletes;
    use \HighIdeas\UsersOnline\Traits\UsersOnlineTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public $timestamps = null;
    protected $dates = ['created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function agendas(){
        return $this->belongsToMany('App\Site','agendas')->withPivot('status','start','end');
    }
    public function isActive()
    {
        return $this->active;
    }

    public function companies(){
        return $this->hasMany('App\Company');
    }

    //Check if user is online
    public function isOnline(){
        return Cache::has('user-is-online-'. $this->id);
    }

    public function employee(){
        return $this->hasOne('App\Employee');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_user');
    }

    public function actions(){
        return $this->hasMany('App\Action','initiator_id');
    }
    
    public function sales(){
        return $this->hasMany('App\Sale', 'initiator_id');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase', 'initiator_id');
    }

    public function totalSales(){
        $total = 0;
        foreach($this->sales->where('validator_id','!=', null) as $sale){
            $total += $sale->total();
        }

        return $total;
    }

    public function totalPurchases(){
        $total = 0;
        foreach($this->purchases->where('validator_id','!=', null) as $pur){
            $total += $pur->total();
        }

        return $total;
    }

    public function salesPercentage(){
        if($this->employee->site->totalSales() == 0) return 0;
        return ($this->totalSales() / $this->employee->site->totalSales())*100;
    }


    public function purchasesPercentage(){
        if($this->employee->site->totalPurchases() == 0) return 0;
        return ($this->totalPurchases() / $this->site->totalPurchases())*100;
    }

}
