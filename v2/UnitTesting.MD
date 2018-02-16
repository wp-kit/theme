# wp-kit/theme 2.0

Welcome to unit testing guide for wp-kit/theme 2.0.

## Unit Testing

The filestructure is very much influenced by [`Themosis` filestructure](https://framework.themosis.com/docs/1.3/theme/#structure) where the resources folder holds the core components.

We have additional folders in wp-kit that are not included in Themosis, one of these is `tests/`.

```php
+-- resources/
|   +-- admin/
|   +-- config/
|   +-- controllers/
|   +-- models/
|   +-- providers/
|   +-- views/
|   +-- tests/
|   +-- widgets/
|   +-- routes.php
+-- functions.php
```

Add your unit tests in this folder. There is an example unit test included with wp-kit:

```php
namespace Theme\Tests;
class ExampleTest extends TestCase {
	public function testBasicTest() {
		
		$this->assertTrue(true);
		
	}
}
```

After installing and running composer, phpunit will be available to run using:

`vendor/bin/phpunit`
