# OpenWeatherMap PHP API

[![Latest Version](https://img.shields.io/github/release/programmatordev/openweathermap-php-api.svg?style=flat-square)](https://github.com/programmatordev/openweathermap-php-api/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Tests](https://github.com/programmatordev/openweathermap-php-api/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/programmatordev/openweathermap-php-api/actions/workflows/ci.yml?query=branch%3Amain)

OpenWeatherMap PHP library that provides convenient access to the OpenWeatherMap API.

Supports [PSR-18 HTTP clients](https://www.php-fig.org/psr/psr-18), [PSR-17 HTTP factories](https://www.php-fig.org/psr/psr-17), [PSR-6 caches](https://www.php-fig.org/psr/psr-6) and [PSR-3 logs](https://www.php-fig.org/psr/psr-3).

## Requirements

- PHP 8.1 or higher.

## API Key

A key is required to be able to make requests to the API.
You must sign up for an [OpenWeatherMap account](https://openweathermap.org/appid#signup) to get one.

## Installation

Install the library via [Composer](https://getcomposer.org/):

```bash
composer require programmatordev/openweathermap-php-api
```

## Basic Usage

Simple usage looks like:

```php
use ProgrammatorDev\OpenWeatherMap\OpenWeatherMap;

// initialize
$api = new OpenWeatherMap('yourapikey');

// get current weather by coordinate (latitude, longitude)
$weather = $api->weather()->getCurrent(50, 50);
// show current temperature
echo $weather->getTemperature();
```

## Documentation

- [Usage](docs/01-usage.md)
- [Configuration](docs/02-configuration.md)
- [Supported APIs](docs/03-supported-apis.md)
- [Error Handling](docs/04-error-handling.md)
- [Entities](docs/05-entities.md)

## Contributing

Any form of contribution to improve this library (including requests) will be welcome and appreciated.
Make sure to open a pull request or issue.

## License

This project is licensed under the MIT license. 
Please see the [LICENSE](LICENSE) file distributed with this source code for further information regarding copyright and licensing.