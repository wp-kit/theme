# wp-kit

Welcome to the PRS-4 guide for wp-kit. The PRS-4 structure in wp-kit is based on [Themosis Namespacing and Autoloading](https://framework.themosis.com/docs/1.3/theme/#namespace-management-and-autoloading).

In order to control your theme namespace, you need to edit the `loading.config.php` file stored into the `resources/config` directory of your theme.

Within the file, you can define as the `key`, your classes namespace and as the `value`, the path to the directory where you store your PHP classes.

Here is the default configuration:

```php
return [
    'Theme\\Controllers\\' => themosis_path('theme.resources').'controllers',
    'Theme\\Models\\' => themosis_path('theme.resources').'models',
    'Theme\\Providers\\' => themosis_path('theme.resources').'providers'
];
```
