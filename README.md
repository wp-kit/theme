# wp-kit/theme

<img src="https://travis-ci.org/wp-kit/theme.svg?branch=master" />

```wp-kit``` is a micro [```RAD```](https://en.wikipedia.org/wiki/Rapid_application_development) (Rapid Application Development) solution for ```Wordpress```.

## Installation

Download [Composer](https://getcomposer.org/download/) and install using this command

 ```php
 composer create-project wp-kit/theme=2.0.0 theme --prefer-dist
 ```

## When should you use wp-kit/theme?

If you are looking for an ```RAD``` for Wordpress you may have come across [```Themosis Framework```](http://framework.themosis.com/) and [```Assely```](https://assely.org/).

```wp-kit/theme``` is very much like these frameworks but has limited features; the benefit of using ```wp-kit/theme``` instead of [```themosis/theme```](https://github.com/themosis/themosis) and [```assely/assely```](https://github.com/assely/assely) is that you do not need to install any respective plugin framework as all the work in done in the theme and imported via ```Composer```.

You should use ```Themosis``` or ```Assely``` is you require any handling of following:

* Routes
* Middleware
* Authentication 
* Metaboxes
* Custom Fields

If you do not need these features then ```wp-kit/theme``` could be for you as it comes packaged with several ```Themosis``` and ```Assely``` features such as:

* ServiceProvider Config
* PostType Registration
* Taxonomy Registration
* Invoke Controllers on Conditions
* View Handling

```wp-kit/theme``` also comes with further features such as:

* Shortcode Registration
* Shortcode View Handling
* Twig (not in Assely)

## Get Involved

To learn more about how to use ```wp-kit``` check out the docs:

[View the Docs](https://github.com/wp-kit/theme/tree/docs/README.md)

Any help is appreciated. The project is open-source and we encourage you to participate. You can contribute to the project in multiple ways by:

- Reporting a bug issue
- Suggesting features
- Sending a pull request with code fix or feature
- Following the project on [GitHub](https://github.com/wp-kit)
- Sharing the project around your community

For details about contributing to the framework, please check the [contribution guide](https://github.com/wp-kit/theme/tree/docs/Contributing.md).

## Requirements

Wordpress 4+

PHP 5.6+

Composer

## Security Vulnerabilities

If you discover a security vulnerability within WP Kit, please send an e-mail to tech@creativelittledots.co.uk or raise an issue on this repo. All security vulnerabilities will be promptly addressed.

## License

wp-kit/theme is open-sourced software licensed under the MIT License.
