# Controllers

In WPKit 1.0, Controllers are a way for you to organise your code. Controllers must be invoked using the [invoke](#invoking) helper.

Often, WordPress developers want to group their [actions and filters](https://codex.wordpress.org/Plugin_API) in a more defined context but do not want to use a traditional controller and would rather invoke a controller based on a condition rather than a path. Controllers also allow you to define scripts that should be used within templates wherever the Controller is invoked.

Lastly, as expected a Controller is invoked once, and once only during the lifecycle of the application regardless of the number of times the condition is met to invoke the Controller.

## Usage

### Controller

WPKit 1.0 comes shipped with a Controller that you can extend too to enable you to benefit from the enqueue scripts feature which helps to reduce the amount of code you need to write to output scripts and styles through ```wp_enqueue_scripts```.

```php
// app/Controllers/FrontPageController.php
namespace App\Controllers;

use WPKit\Invoker\Controller;

class FrontPageController extends Controller {
	
	var $scripts = [
		'scripts/vendor/modernizr.min.js',
		'scripts/vendor/foundation.min.js',
		'scripts/vendor/autocomplete.min.js',
		'app' => [
		    'file' => 'scripts/app.min.js'
		],
		'scripts/framework/foundation.min.css',
		'styles/style.css',
	];
	
	public function getScripts() {
	
		wp_deregister_script('jquery-serialize-object');
		
		$this->scripts['app']['localize'] = [
		    'name' => 'myAjax',
		    'data' => [ 
		        'ajax_url' => admin_url( 'admin-ajax.php' )
		    ]
		];
		
		return parent::getScripts();
	
	}
	
	public function beforeFilter() {
			
		add_action( 'wp_head', array( $this, 'helloWorld' ), 10, 2 );
		
		parent::beforeFilter();
	
	}
	
	public function helloWorld() {
	
		echo 'hello world!';
	
	}
	
}
```

### Invoking

The invoker helper should be used to define when Controllers are invoked, usually a Controller is invoked on a specific hook, on a specific condition.

```php
// app/routes.php

// $callback 	( string / array / callable )
// $hook 		( string )
// $condition 	( string / callable )
// $priority 	( int )
// invoke( $callback, $hook, $condition, $priority );

invoke( 'AppController' );

invoke( 'FrontPageController', 'template_redirect', 'is_front_page' );

invoke( 'ShopController', 'wp', function() {

	return is_shop() || is_post_type_archive( 'product') || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) || is_tax( 'product_brand' ) || is_tax( 'company_portal' );
	
} );

```
