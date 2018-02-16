
# components

In wpkit, components are view files that can be called within a Template or a Controller.

You are able to use Twig (as provided by Timber), and plain vanilla PhP files for views.

## Usage

### Within a Template

To call a component with a template, you can use the `get_component` and `the_component` helpers.

Both functions accepts three arguments:

```php
/*
 * string $folder (the folder name where the view file is situated within the Components folder
 * string $file (the view file without any extension)
 * array $argse (an array of arguments to pass into the view
 */
function get_component($folder, $file, $args = array()) {}
```

When using `get_component`, the view is returned rather, but when using `the_component` the response is echoed:

```php
$html = get_component('Post', 'block', array('post' => $post));
wp_send_json('html');
```

```html
<div class="post">
  <?php the_component('Post', 'block', array('post' => $post)); ?>
<div>
```

### Within a Controller

Controllers come with a `::render` helper method that wraps `get_component`.

Unlike the Template helpers, the Controller helper accepts only two arguments. This is because the first argument required by `get_component` is taken from the Controller classname using regex. For example, `PostsController` would translate to `Posts` being passed as the first argument into `get_component`.

```php
namespace App\Classes;

use WPKit\Core\Controller;

class PostsController extends Controller {

  public function beforeFilter() {
  
      add_action( 'wp_head', array($this, 'renderMessage') );
      
  }
  
  public function renderMessage() {
  
     $post = get_post(1);
     
     echo $this->render('message', compact('post'));
     
  }
  
}
```

The above is the equivalent of the below:

```php
the_component('Posts', 'message', array('post' => get_post(1)));
```
