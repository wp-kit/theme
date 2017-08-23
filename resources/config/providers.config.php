<?php
/**
 * Define a list of service providers to use in your theme.
 */
return [
	Theme\Providers\ErrorServiceProvider::class,
	WPKit\Invoker\InvokerServiceProvider::class,
	Illuminate\View\ViewServiceProvider::class,
	Illuminate\Events\EventServiceProvider::class,
	Illuminate\Filesystem\FilesystemServiceProvider::class,
	Theme\Providers\TwigServiceProvider::class,
	WPKit\Shortcodes\ShortcodeServiceProvider::class,
    Theme\Providers\RouteServiceProvider::class,
    Theme\Providers\RegistryServiceProvider::class,
];