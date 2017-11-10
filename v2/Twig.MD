# wp-kit/theme 2.0

Welcome to Twig & Views guide for wp-kit/theme 2.0.

The view structure in wp-kit is based on how Themosis implements [Twig](https://framework.themosis.com/docs/1.3/twig/) and [Views](https://framework.themosis.com/docs/1.3/views/).

You are able to use Twig, and plain vanilla PhP files for views. Blade is not supported at the moment.

By default, views are stored in the `resources/views` directory of your wp-kit theme.

## Create a view

The most basic view is a PHP file. To create a view, first add a new PHP file into one of the views directories. Here is an example of a simple view file stored as `hello.php`:

```php
<!-- View stored in resources/views/hello.php -->
<html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
        <h1>Hello, World!</h1>
    </body>
</html>
```

Then, in order to create a view instance from this view file, call the `make()` method and pass it our `hello` view name like so:

```
$hello = View::make('hello');
```

The code above only creates a view instance and do not render anything on screen. The first parameter you pass to the `make()` method is the view name, which is basically the file name (or path) without the its file extension.

Other examples can be found in [Themosis Docs](https://framework.themosis.com/docs/1.3/views/).
