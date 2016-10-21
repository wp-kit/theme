<?php

// make sure composer has been installed
if( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	
	wp_die('Composer has not been installed, try running composer', 'Dependancy Error');
	
}


// Use composer to load the autoloader.
require __DIR__ . '/vendor/autoload.php';

// normal wordpress stuff

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

register_nav_menus(
	array(
		'header-menu' => __( 'Header Menu' )
	)
);

register_sidebar(array(
	'name'          => sprintf( __( 'Default' ) ),
	'id'            => "default",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
));