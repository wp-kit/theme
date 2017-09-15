<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class HttpServiceProvider extends ServiceProvider
{
    /**
     * Define theme routes namespace.
     */
    public function register()
    {
	    
	    $this->app->instance('request', Request::capture());
	    
        require resources_path('routes.php');
        
    }
}
