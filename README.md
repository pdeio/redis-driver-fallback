# REDIS CACHE DRIVER FALLBACK (Laravel 5.8.* Package)

[![Version](https://img.shields.io/static/v1.svg?label=packagist&message=v1.0.0&color=blue)](https://packagist.org/packages/pdeio/redis-driver-fallback)
[![License](https://img.shields.io/static/v1.svg?label=license&message=MIT&color=blue)](https://packagist.org/packages/pdeio/redis-driver-fallback)

When the redis server stops, a second cache driver starts working. Laravel's cache can be cleared whenever the redis server is returned or the second cache driver is started. In this way, the cache system remains synchronized without the problem of loading the old cache registers.

## Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [License](#license)

## Installation

1) In order to install Redis Drive Fallback, just run:

```
composer require pdeio/redis-driver-fallback
```

2) To create the configuration file (config/redis-driver-fallback.php) run:

```
php artisan vendor:publish
```

## Configuration

Set the property values in the `config/redis-driver-fallback.php`.

    /*
    |--------------------------------------------------------------------------
    | Cache Driver Fallback
    |--------------------------------------------------------------------------
    |
    | This option controls the fallback cachedriver that temporarily replaces the redis cache.
    |
    | Supported: "apc", "array", "database", "file",
    |            "memcached", "dynamodb"
    |
    */

    'fallback_driver' => 'file',

    /*
    |--------------------------------------------------------------------------
    | Synchronization mode
    |--------------------------------------------------------------------------
    |
    | Here it is possible to define the synchronization mode: when the redis server stops,
    | cache of the new driver selected is cleared in order to remain updated.
    | When the redis returns, the redis cache is cleared before running again.
    | This way, you don't run the risk of downloading not updated data from the cache.
    |
    | Set true, to activate the synchronization mode.
    */

    'sync_mode' => false,

    /*
    |--------------------------------------------------------------------------
    | Alert email
    |--------------------------------------------------------------------------
    |
    | You have the option to send yourself an email with a default text,
    | whenever the redis server should fall.
    |
    | It is recomended that you use the event ('redis.unvailable') which is fired
    | whenever the redis stops working, to send the email through your controller
    | and using your laravel queues.
    |
    | In case of problems with the mail service, it is possible to catch the error
    | without interrupting the entire cache request. Set "catch_error" to true, so a
    | log error will be saved in "app/storage/app/redis/mails_error.log" with more
    | details. If you set this option to false, laravel will force to send e-mails
    | and an error exception will interrupt the request with an error exception.
    | It is recommended to leave this option on false, in development mode.
    |
    */

    'email_config' => [
        'send_email' => false,
        'to' => 'email@email.com',
        'catch_error' => false,
    ]

## License

Redis Driver Fallback is free software distributed under the terms of the MIT license.

