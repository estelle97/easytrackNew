<?php

namespace App\Providers;

use Carbon\Carbon;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        // $startTime = date("Y-m-d H:i:s");
        // $endTime = date("Y-m-d H:i:s", strtotime('+100 day +1 hour +30 minutes +45 seconds',strtotime($startTime)));
        // $expTime = \DateTime::createFromFormat("Y-m-d H:i:s", $endTime);
        // Passport::tokensExpireIn($expTime);
        
        Passport::tokensExpireIn(Carbon::now()->addDays(7));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::personalAccessTokensExpireIn(Carbon::now()->addMonths(6));
    }
}
