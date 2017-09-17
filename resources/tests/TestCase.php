<?php

namespace Theme\Tests;

use PHPUnit_Framework_TestCase;

abstract class TestCase extends PHPUnit_Framework_TestCase
{
	
	/**
	* The base URL to use while testing the application.
	*
	* @var string
	*/
	protected $baseUrl = 'http://localhost';
	
	protected function setUp() {
	
		// Load the basics part of WordPress.
		require_once ABSPATH . '/wp-settings.php';
		
	}

}
