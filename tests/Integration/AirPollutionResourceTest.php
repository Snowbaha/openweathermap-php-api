<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Integration;

use ProgrammatorDev\OpenWeatherMap\Entity\AirPollution\AirPollution;
use ProgrammatorDev\OpenWeatherMap\Entity\AirPollution\AirPollutionCollection;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;
use ProgrammatorDev\OpenWeatherMap\Test\MockResponse;
use ProgrammatorDev\OpenWeatherMap\Test\Util\TestValidationExceptionTrait;
use ProgrammatorDev\OpenWeatherMap\Test\Util\TestItemResponseTrait;

class AirPollutionResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get current' => [
            AirPollution::class,
            MockResponse::AIR_POLLUTION_CURRENT,
            'airPollution',
            'getCurrent',
            [50, 50]
        ];
        yield 'get forecast' => [
            AirPollutionCollection::class,
            MockResponse::AIR_POLLUTION_FORECAST,
            'airPollution',
            'getForecast',
            [50, 50]
        ];
        yield 'get history' => [
            AirPollutionCollection::class,
            MockResponse::AIR_POLLUTION_HISTORY,
            'airPollution',
            'getHistory',
            [50, 50, new \DateTime('-1 day'), new \DateTime('now')]
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get current, latitude lower than -90' => ['airPollution', 'getCurrent', [-91, 50]];
        yield 'get current, latitude greater than 90' => ['airPollution', 'getCurrent', [91, 50]];
        yield 'get current, longitude lower than -180' => ['airPollution', 'getCurrent', [50, -181]];
        yield 'get current, longitude greater than 180' => ['airPollution', 'getCurrent', [50, 181]];
        yield 'get forecast, latitude lower than -90' => ['airPollution', 'getForecast', [-91, 50]];
        yield 'get forecast, latitude greater than 90' => ['airPollution', 'getForecast', [91, 50]];
        yield 'get forecast, longitude lower than -180' => ['airPollution', 'getForecast', [50, -181]];
        yield 'get forecast, longitude greater than 180' => ['airPollution', 'getForecast', [50, 181]];
        yield 'get history, latitude lower than -90' => ['airPollution', 'getHistory', [-91, 50, new \DateTime('-1 day'), new \DateTime('now')]];
        yield 'get history, latitude greater than 90' => ['airPollution', 'getHistory', [91, 50, new \DateTime('-1 day'), new \DateTime('now')]];
        yield 'get history, longitude lower than -180' => ['airPollution', 'getHistory', [50, -181, new \DateTime('-1 day'), new \DateTime('now')]];
        yield 'get history, longitude greater than 180' => ['airPollution', 'getHistory', [50, 181, new \DateTime('-1 day'), new \DateTime('now')]];
        yield 'get history, end date before start date' => ['airPollution', 'getHistory', [50, 50, new \DateTime('now'), new \DateTime('-1 day')]];
    }
}