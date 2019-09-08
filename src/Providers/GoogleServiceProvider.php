<?php

namespace Jybtx\GoogAuth\Providers;

use Illuminate\Support\ServiceProvider;

use Jybtx\GoogAuth\GoogAuth\GoogleTwoFa;

class GoogleServiceProvider extends ServiceProvider
{
	
	public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->singleton('GoogAuth', function () {
            return new GoogleTwoFa;
        });
    }

}