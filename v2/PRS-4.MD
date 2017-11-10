# wp-kit/theme 2.0

Welcome to PRS-4 guide for wp-kit/theme 2.0.

The PRS-4 structure in wp-kit is based on [Themosis Namespacing and Autoloading](https://framework.themosis.com/docs/1.3/theme/#namespace-management-and-autoloading).

## Namespace management and autoloading

In order to control your theme namespace, you need to edit the `loading.config.php` file stored into the `resources/config` directory of your theme.

Within the file, you can define as the `key`, your classes namespace and as the `value`, the path to the directory where you store your PHP classes.

Here is the default configuration:

```php
return [
    'Theme\\Controllers\\' => resources_path('controllers'),
    'Theme\\Providers\\' => resources_path('providers'),
    'Theme\\PostTypes\\' => resources_path('postTypes'),
    'Theme\\Shortcodes\\' => resources_path('shortcodes'),
    'Theme\\Taxonomies\\' => resources_path('taxonomies'),
    'Theme\\Tests\\' => resources_path('tests'),
    'Theme\\Widgets\\' => resources_path('widgets')
];
```
