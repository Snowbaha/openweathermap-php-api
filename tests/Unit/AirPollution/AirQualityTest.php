<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\AirPollution;

use ProgrammatorDev\OpenWeatherMap\Entity\AirPollution\AirQuality;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class AirQualityTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new AirQuality([
            'aqi' => 1
        ]);

        $this->assertSame(1, $entity->getIndex());
        $this->assertSame('Good', $entity->getQualitativeName());
    }
}