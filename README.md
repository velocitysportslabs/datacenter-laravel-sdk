# Laravel VSL Data Center

Laravel VSL Data Center is a [VSL Data Center PHP SDK](https://github.com/velocitysportslabs/datacenter-php-sdk) bridge for [Laravel](https://laravel.com/).

## Installation

This package requires [PHP](https://www.php.net/) ^8.1 and supports [Laravel](https://laravel.com/) 10 and above.

You can install the package via composer by running:

```bash
composer require velocity-sports-labs/datacenter-laravel-sdk
```

After the installation has completed, the package will automatically register itself.
Run the following to publish the config file

```bash
php artisan vendor:publish --provider="VelocitySportsLabs\DataCenter\DataCenterServiceProvider"
```

This creates a `config/vsl-datacenter.php` config file with contents like:

```php
<?php

return [
    'api_base' => env('VSL_DATA_CENTER_BASE_URL', ''),

    'api_key' => env('VSL_DATA_CENTER_KEY'),

    'origin' => env('VSL_DATA_CENTER_ORIGIN'),

    'user_agent' => env('VSL_DATA_CENTER_USER_AGENT', ''),
];
```

Do not worry about the `api_base` and `user_gent` keys, but it is advisable to set the `user_agent` key. In your `.env` file, you can set the `VSL_DATA_CENTER_USER_AGENT` environment variable as below

```php
VSL_DATA_CENTER_USER_AGENT="${APP_NAME}"
```

## Usage

Here you can see an example of just how simple this package is to use. After you enter your authentication details in the config file, it will just work:

```php
use VelocitySportsLabs\DataCenter\DataCenter;

DataCenter::countries()->list();
// we're done here - how easy was that, it just works!
// this example is simple, and there are far more methods available
```

The DataCenter facade is bound to the `` class behind the scenes. For more information on how to use the class, check out the docs at <https://github.com/velocitysportslabs/datacenter-php-sdk>,

## Testing

Run the tests with:

``` bash
vendor/bin/pest
```

## Roadmap

Here are a list of outstanding tasks to do:

* [ ] add tests

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you've found a bug regarding security please mail [abdulkudus2922@gmail.com](mailto:abdulkudus2922@gmail.com) instead of using the issue tracker.

## Credits

* [Abdul Kudus Issah](https://github.com/alhaji-aki)
* [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
