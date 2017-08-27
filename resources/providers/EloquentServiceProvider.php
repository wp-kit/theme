<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Capsule\Manager as Capsule;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $capsule = new Capsule($this->app);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        
    }
}