<?php
namespace Jybtx\GoogleAuth\Providers;

use Illuminate\Support\ServiceProvider;
use Jybtx\GoogleAuth\GoogleSecondarySuthentication;

class GoogleServiceProvider extends ServiceProvider
{
	
	public function boot()
    {
        //
    }
    public function register()
    {
        $this->app->singleton('GoogAuth', function () {
            return new GoogleSecondarySuthentication;
        });
    }
}