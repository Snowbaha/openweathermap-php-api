<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Integration;

use ProgrammatorDev\OpenWeatherMap\Resource\GeocodingResource;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class OpenWeatherMapTest extends AbstractTest
{
    public function testMethods()
    {
        $this->assertInstanceOf(GeocodingResource::class, $this->api->geocoding());
    }
}