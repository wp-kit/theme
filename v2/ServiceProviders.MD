# wp-kit/theme 2.0

Welcome to Service Providers guide for wp-kit/theme 2.0.

The way Service Providers work in wp-kit is exactly the same as in [Laravel](https://laravel.com/docs/5.5/providers).

## Registering Service Provider

Service Providers should extend the `Illuminate\Support\ServiceProvider` class directly and should reside in `resources/providers` in you wp-kit theme.

Let's take a look at a basic service provider. Within any of your service provider methods, you always have access to the `$app` property which provides access to the service container:

```php
<?php

namespace App\Providers;

use Riak\Connection;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection(config('riak'));
        });
    }
}
```

Other examples can be found in [Laravel Docs](https://laravel.com/docs/5.5/container).
