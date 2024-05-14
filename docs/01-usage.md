# Using OpenWeatherMap PHP API

- [Requirements](#requirements)
- [API Key](#api-key)
- [Installation](#installation)
- [Basic Usage](#basic-usage)

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