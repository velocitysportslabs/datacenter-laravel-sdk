# Laravel FSL Data Center

Laravel FSL Data Center is a [FSL Data Center PHP SDK](https://github.com/Focus-Sports-Labs/datacenter-php-sdk) bridge for [Laravel](https://laravel.com/).

## Installation

This package requires [PHP](https://www.php.net/) ^8.1 and supports [Laravel](https://laravel.com/) 8 and above.

You can install the package via composer by running:

```bash
composer require focus-sports-labs/data-center-laravel
```

After the installation has completed, the package will automatically register itself.
Run the following to publish the config file

```bash
php artisan vendor:publish --provider="FocusSportsLabs\FslDataCenter\FSLDataCenterServiceProvider"
```

This creates a `config/fsl-datacenter.php` config file with contents like:

```php
<?php

return [
    'api_base' => env('FSL_DATA_CENTER_BASE_URL', ''),

    'api_key' => env('FSL_DATA_CENTER_KEY'),

    'origin' => env('FSL_DATA_CENTER_ORIGIN'),

    'user_agent' => env('FSL_DATA_CENTER_USER_AGENT', ''),
];
```

Do not worry about the `api_base` and `user_gent` keys but it is advisable to set the `user_agent` key. In your `.env` file, you can set the `FSL_DATA_CENTER_USER_AGENT` environment variable as below

```php
FSL_DATA_CENTER_USER_AGENT="${APP_NAME}"
```

## Usage

Here you can see an example of just how simple this package is to use. After you enter your authentication details in the config file, it will just work:

```php
use FocusSportsLabs\FslDataCenter\FslDataCenter;

FSLDataCenter::countries()->list();
// we're done here - how easy was that, it just works!
// this example is simple, and there are far more methods available
```

The FSLDataCenter facade is bound to the `` class behind the scenes. For more information on how to use the class, check out the docs at <https://github.com/Focus-Sports-Labs/datacenter-php-sdk>,

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
