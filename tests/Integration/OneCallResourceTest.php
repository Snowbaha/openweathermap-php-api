<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Integration;

use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\Weather;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\WeatherMoment;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\WeatherSummary;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;
use ProgrammatorDev\OpenWeatherMap\Test\MockResponse;
use ProgrammatorDev\OpenWeatherMap\Test\Util\TestValidationExceptionTrait;
use ProgrammatorDev\OpenWeatherMap\Test\Util\TestItemResponseTrait;

class OneCallResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get weather' => [
            Weather::class,
            MockResponse::ONE_CALL_WEATHER,
            'oneCall',
            'getWeather',
            [50, 50]
        ];
        yield 'get weather by date' => [
            WeatherMoment::class,
            MockResponse::ONE_CALL_TIMEMACHINE,
            'oneCall',
            'getWeatherByDate',
            [50, 50, new \DateTime()]
        ];
        yield 'get weather summary by date' => [
            WeatherSummary::class,
            MockResponse::ONE_CALL_DAY_SUMMARY,
            'oneCall',
            'getWeatherSummaryByDate',
            [50, 50, new \DateTime()]
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get weather, latitude lower than -90' => ['oneCall', 'getWeather', [-91, 50]];
        yield 'get weather, latitude greater than 90' => ['oneCall', 'getWeather', [91, 50]];
        yield 'get weather, longitude lower than -180' => ['oneCall', 'getWeather', [50, -181]];
        yield 'get weather, longitude greater than 180' => ['oneCall', 'getWeather', [50, 181]];
        yield 'get weather by date, latitude lower than -90' => ['oneCall', 'getWeatherByDate', [-91, 50, new \DateTime()]];
        yield 'get weather by date, latitude greater than 90' => ['oneCall', 'getWeatherByDate', [91, 50, new \DateTime()]];
        yield 'get weather by date, longitude lower than -180' => ['oneCall', 'getWeatherByDate', [50, -181, new \DateTime()]];
        yield 'get weather by date, longitude greater than 180' => ['oneCall', 'getWeatherByDate', [50, 181, new \DateTime()]];
        yield 'get weather summary by date, latitude lower than -90' => ['oneCall', 'getWeatherSummaryByDate', [-91, 50, new \DateTime()]];
        yield 'get weather summary by date, latitude greater than 90' => ['oneCall', 'getWeatherSummaryByDate', [91, 50, new \DateTime()]];
        yield 'get weather summary by date, longitude lower than -180' => ['oneCall', 'getWeatherSummaryByDate', [50, -181, new \DateTime()]];
        yield 'get weather summary by date, longitude greater than 180' => ['oneCall', 'getWeatherSummaryByDate', [50, 181, new \DateTime()]];
    }
}