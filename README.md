# wp-kit/theme

```wp-kit``` is a [```RAD```](https://en.wikipedia.org/wiki/Rapid_application_development) (Rapid Application Development) solution for ```Wordpress```.

[View the Docs](https://github.com/wp-kit/theme/docs)

## When should you use wp-kit/theme?

If you are looking for an ```RAD``` for Wordpress and have come across [```Themosis Framework```](http://framework.themosis.com/), then you should know that ```wp-kit/theme``` is to [```themosis/theme```](https://github.com/themosis/theme) as ```laravel/lumen``` is to ```laravel/framework```.

The benefit of using ```wp-kit/theme``` instead of [```themosis/theme```]((https://github.com/themosis/themosis)) is that you do not need to install the ```themosis/themosis``` environment.

You should use ```Themosis``` is you require any handling of following:

* Routes
* Authentication 

This is because ```themosis/themosis``` intercepts and handles the request to allow for such things as middleware at a higher level outside of the theme.

If you do not need these features then ```wp-kit/theme``` could be for you comes packaged with several ```Themosis``` features such as:

* ServiceProvider Config
* PostType Registration
* Taxonomy Registration
* Shortcode Registration
* Invoke Controllers on Conditions
* Components / Views

## Requirements

Wordpress 4+

PHP 5.6+

Composer

## Installation

Download [Composer](https://getcomposer.org/download/) and install using this command

 ```php
 composer create-project wp-kit/theme
 ```

## Security Vulnerabilities

If you discover a security vulnerability within WP Kit, please send an e-mail to tech@creativelittledots.co.uk or raise an issue on this repo. All security vulnerabilities will be promptly addressed.

## License

wp-kit/theme is open-sourced software licensed under the MIT License.
