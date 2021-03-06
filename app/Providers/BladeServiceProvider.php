<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('subscribed', function(){
            return auth()->user()->hasSubscription();
        });

        Blade::if('notsubscribed', function(){
            return ! auth()->check() || auth()->user()->doesnotHaveSubscription();
        });

        Blade::if('subscriptioncancelled', function(){
            return auth()->user()->hasCancelled();
        });

        Blade::if('subscriptionnotcancelled', function(){
            return auth()->user()->hasNotCancelled();
        });

        Blade::if('teamsubscription', function(){
            return auth()->user()->hasTeamSubscription();
        });

        Blade::if('piggybacksubscription', function(){
            return !auth()->user()->hasPiggybackSubscription();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
