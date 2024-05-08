<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Integration;

use ProgrammatorDev\OpenWeatherMap\Entity\Geocoding\ZipLocation;
use ProgrammatorDev\OpenWeatherMap\Entity\Location;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;
use ProgrammatorDev\OpenWeatherMap\Test\MockResponse;
use ProgrammatorDev\OpenWeatherMap\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\OpenWeatherMap\Test\Util\TestValidationExceptionTrait;
use ProgrammatorDev\OpenWeatherMap\Test\Util\TestItemResponseTrait;

class GeocodingResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by zip code' => [
            ZipLocation::class,
            MockResponse::GEOCODING_ZIP,
            'geocoding',
            'getByZipCode',
            ['1000-001', 'pt']
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get by location name' => [
            Location::class,
            MockResponse::GEOCODING_DIRECT,
            'geocoding',
            'getByLocationName',
            ['test']
        ];
        yield 'get by coordinate' => [
            Location::class,
            MockResponse::GEOCODING_REVERSE,
            'geocoding',
            'getByCoordinate',
            [50, 50]
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get by location name, blank value' => ['geocoding', 'getByLocationName', ['']];
        yield 'get by location name, zero num results' => ['geocoding', 'getByLocationName', ['test', 0]];
        yield 'get by coordinate, latitude lower than -90' => ['geocoding', 'getByCoordinate', [-91, 50]];
        yield 'get by coordinate, latitude greater than 90' => ['geocoding', 'getByCoordinate', [91, 50]];
        yield 'get by coordinate, longitude lower than -180' => ['geocoding', 'getByCoordinate', [50, -181]];
        yield 'get by coordinate, longitude greater than 180' => ['geocoding', 'getByCoordinate', [50, 181]];
        yield 'get by coordinate, zero num results' => ['geocoding', 'getByCoordinate', [50, 50, 0]];
        yield 'get by zip code, blank zip code' => ['geocoding', 'getByZipCode', ['', 'pt']];
        yield 'get by zip code, blank country code' => ['geocoding', 'getByZipCode', ['1000-001', '']];
        yield 'get by zip code, invalid country code' => ['geocoding', 'getByZipCode', ['1000-001', 'invalid']];
    }
}