# auth

WPKit 1.0 comes with three types of Auth:

* Basic Authentication (Illuminate): [auth.basic]
* Token Authentication: [auth.token]
* Form Authentication (WP): [auth.form]


## Usage

There is an auth helper function that can be used anywhere in your application, but the most common place the call the auth function is within `app/routes.php`.

### Basic Authentication

Basic auth only autnaticates with the users `user_login` column at the moment, it works out of the box and does not require any further configuration.

```php
auth('basic');
```

### Token Authentication

Token authentication is best when your application is serving another web / mobile application. You exchange the users credentials for a token which can be used as a Bearer token in later requests.

```js
$.post(apiUrl + '/oauth/token', {
	username: 'youremail@yourcompany.com',
	password: 'supersecurepassword'
});
```

```php
auth('token', array(
	'username' => array(
	  'login',
	  'email'
	),
	'allow' => array(
	  '/tips',
	  '/tip/*'
	),
	'limit' => 5,
	'issuer' => function( $token, \WP_User $user ) {
	
		return array(
			'access_token' => $token,
			'expires_in' => 3600,
			'token_type' => 'Bearer',
			'scope' => 'basic',
			'refresh_token' => null
		);
	
	}
));
```

### Form Authentication

Form auth allows you to only let logged in users into your application and access the dissallowed routes and pages via a custom form. Make sure you set your form action as the `wp_login_url()`, the form auth component deals with the rest.

```php
auth('form', array(
	'mask_wp_login' => true,
	'allow' => array(
	  '/tips',
	  '/tip/*'
	),
	'disallow' => array(
	  '/account',
	  '/account/*'
	),
	'login_redirect' => '/dashboard',
	'logout_redirect' => '/login'
));
```
