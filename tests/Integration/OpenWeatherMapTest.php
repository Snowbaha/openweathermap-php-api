<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Integration;

use ProgrammatorDev\OpenWeatherMap\Resource\AirPollutionResource;
use ProgrammatorDev\OpenWeatherMap\Resource\GeocodingResource;
use ProgrammatorDev\OpenWeatherMap\Resource\OneCallResource;
use ProgrammatorDev\OpenWeatherMap\Resource\WeatherResource;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class OpenWeatherMapTest extends AbstractTest
{
    public function testMethods()
    {
        $this->assertInstanceOf(OneCallResource::class, $this->api->oneCall());
        $this->assertInstanceOf(WeatherResource::class, $this->api->weather());
        $this->assertInstanceOf(AirPollutionResource::class, $this->api->airPollution());
        $this->assertInstanceOf(GeocodingResource::class, $this->api->geocoding());
    }
}