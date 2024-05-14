<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit;

use ProgrammatorDev\OpenWeatherMap\Entity\Coordinate;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class CoordinateTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Coordinate([
            'lat' => 50,
            'lon' => 50
        ]);

        $this->assertSame(50.0, $entity->getLatitude());
        $this->assertSame(50.0, $entity->getLongitude());
    }
}