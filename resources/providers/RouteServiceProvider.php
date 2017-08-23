<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define theme routes namespace.
     */
    public function register()
    {
        require resources_path('routes.php');
    }
}