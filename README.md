# [WP Kit (Theme)](http://creativelittledots.github.io/wp-kit/)

The Creative Little WP Kit is a RAD (Rapid Application Development) solution for Wordpress, for use in your theme.

WPKit use MCEDC (Model Component Event Driven Controller) methodology, an combination of MVC and Event Driven architecture which is inherent in Wordpress.

It allows fast Model creation using our Model Layer technology, allowing you to layer on top of the Post or Taxonomy Model in Wordpress to generate Post Types & Taxonomies.

It also allows for grouping of Events (Actions / Filters) in Controllers by invoking them on specified actions and conditions.

Timber (Twig) has been implemented which allows for component segregation for use in Wordpress templates.

## Requirements

Wordpress 4+

PHP 5.6+

WPKit Installer

Composer

## Installation (Via WPKit Installer)

  * Download the [WP Kit Installer](https://github.com/creativelittledots/wp-kit-installer) and install it
  * Run the following command
  
  ```php
  wpkit new theme themename
  ```
  
  * That's it, get coding!
  
## Installation (Via Download)

  * Download this repo and unzip to your themes folder
  * Name the folder whatever you want your theme to be called
  * Navigate to your theme folder in Terminal
  ```php
  cd /path/to/your/new/theme/folder
  ```
  * [Installer Composer](https://getcomposer.org/download/)
  * Then finally run the following command to update Composer which will install WP Kit Core
  
  ```php
  composer update
  ```

## Official Documentation

Documentation for the framework can be found at our [Git Docs](http://creativelittledots.github.io/wp-kit/).

## Security Vulnerabilities

If you discover a security vulnerability within WP Kit, please send an e-mail to tech@creativelittledots.co.uk or raise an issue on this repo. All security vulnerabilities will be promptly addressed.

## License

Creative Little WP Kit is open-sourced software licensed under the MIT License.