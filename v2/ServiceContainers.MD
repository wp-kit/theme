# wp-kit/theme 2.0

Welcome to Service Containers guide for wp-kit/theme 2.0.

The way Service Containers work in wp-kit is exactly the same as in [Laravel](https://laravel.com/docs/5.5/container).

## Dependancy Injection

The service container is a powerful tool for managing class dependencies and performing dependency injection. Dependency injection is a fancy phrase that essentially means this: class dependencies are "injected" into the class via the constructor or, in some cases, "setter" methods.

Let's look at a simple example:

```php
<?php

namespace App\Http\Controllers;

use App\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);

        return view('user.profile', ['user' => $user]);
    }
}
```

## Bindings

Much like in Laravel, almost all of your service container bindings will be registered within service providers, so most of these examples will demonstrate using the container in that context.

```php
$this->app->bind('HelpSpot\API', function ($app) {
    return new HelpSpot\API($app->make('HttpClient'));
});
```

Other examples can be found in [Laravel Docs](https://laravel.com/docs/5.5/container).

