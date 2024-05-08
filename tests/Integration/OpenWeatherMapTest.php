<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Integration;

use ProgrammatorDev\OpenWeatherMap\Resource\GeocodingResource;
use ProgrammatorDev\OpenWeatherMap\Resource\WeatherResource;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class OpenWeatherMapTest extends AbstractTest
{
    public function testMethods()
    {
        $this->assertInstanceOf(GeocodingResource::class, $this->api->geocoding());
        $this->assertInstanceOf(WeatherResource::class, $this->api->weather());
    }
}