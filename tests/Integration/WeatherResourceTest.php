<?php

namespace Integration;

use ProgrammatorDev\OpenWeatherMap\Entity\Weather\Weather;
use ProgrammatorDev\OpenWeatherMap\Entity\Weather\WeatherCollection;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;
use ProgrammatorDev\OpenWeatherMap\Test\MockResponse;
use ProgrammatorDev\OpenWeatherMap\Test\Util\TestValidationExceptionTrait;
use ProgrammatorDev\OpenWeatherMap\Test\Util\TestItemResponseTrait;

class WeatherResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get current' => [
            Weather::class,
            MockResponse::WEATHER_CURRENT,
            'weather',
            'getCurrent',
            [50, 50]
        ];
        yield 'get forecast' => [
            WeatherCollection::class,
            MockResponse::WEATHER_FORECAST,
            'weather',
            'getForecast',
            [50, 50]
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get current, latitude lower than -90' => ['weather', 'getCurrent', [-91, 50]];
        yield 'get current, latitude greater than 90' => ['weather', 'getCurrent', [91, 50]];
        yield 'get current, longitude lower than -180' => ['weather', 'getCurrent', [50, -181]];
        yield 'get current, longitude greater than 180' => ['weather', 'getCurrent', [50, 181]];
        yield 'get forecast, latitude lower than -90' => ['weather', 'getForecast', [-91, 50]];
        yield 'get forecast, latitude greater than 90' => ['weather', 'getForecast', [91, 50]];
        yield 'get forecast, longitude lower than -180' => ['weather', 'getForecast', [50, -181]];
        yield 'get forecast, longitude greater than 180' => ['weather', 'getForecast', [50, 181]];
        yield 'get forecast, zero num results' => ['weather', 'getForecast', [50, 50, 0]];
    }
}