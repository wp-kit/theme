<?php

if( ! class_exists('WPKit\Foundation\Application') ) {

	// make sure composer has been installed
	if( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {

		wp_die('Composer has not been installed, try running composer', 'Dependancy Error');
	}


	// Use composer to load the autoloader.
	require __DIR__ . '/vendor/autoload.php';
	
}

// if we don't have WPKit at this point we probably should die
	    
if( ! class_exists('WPKit\Foundation\Application') ) {

    wp_die('WPKit\Foundation\Application is not installed, try running composer', 'Dependancy Error');
    
}

/*
 * Load app configuration files.
 */
app('config.finder')->addPaths([
    config_path() . DS
]);

/*
 * Define constants
 */
foreach(app('config')->get('constants') as $constant => $value) {
	! defined($constant) && define($constant, $value);
}

/*
 * Autoloading.
 */
$loader = new \Composer\Autoload\ClassLoader();
foreach (app('config')->get('loading') as $prefix => $path) {
    $loader->addPsr4($prefix, $path);
}
$loader->register();

/**
 * Register theme providers.
 */
foreach (app('config')->get('providers') as $provider) {
	
    app()->register($provider);
    
}

// normal wordpress stuff

add_theme_support( 'woocommerce' );
