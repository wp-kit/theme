# auth

WPKit 1.0 comes with three types of Auth:

* Basic Authentication (Illuminate): [auth.basic]
* Token Authentication: [auth.token]
* Form Authentication: [auth.form]


## Usage

There is an auth helper function that can be used anywhere in your application, but the most common place the call the auth function is within `app/routes.php`.

### Basic Authentication

```php
auth('basic');
```

### Token Authentication

```php
auth('token', array(
	'username' => array(
	  'login',
	  'email'
	),
	'allow' => array(
	  '/tips',
	  '/tip/*'
	)
));
```

### Form Authentication

```php
auth('form', array(
	'username' => array(
	  'login',
	  'email'
	),
	'allow' => array(
	  '/tips',
	  '/tip/*'
	)
));
```
