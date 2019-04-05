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

## License

Redis Driver Fallback is free software distributed under the terms of the MIT license.

