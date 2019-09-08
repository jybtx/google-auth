<?php
namespace Jybtx\GoogAuth\Faceds;

use Illuminate\Support\Facades\Facade;

class GoogleAuthFaced extends Facade
{
	
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'GoogAuth';
    }
}