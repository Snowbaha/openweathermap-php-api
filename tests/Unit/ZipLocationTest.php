<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit;

use ProgrammatorDev\OpenWeatherMap\Entity\Coordinate;
use ProgrammatorDev\OpenWeatherMap\Entity\Geocoding\ZipLocation;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class ZipLocationTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new ZipLocation([
            'zip' => '1234-567',
            'name' => 'name',
            'country' => 'co',
            'lat' => 50,
            'lon' => 50
        ]);

        $this->assertSame('1234-567', $entity->getZipCode());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('co', $entity->getCountryCode());
        $this->assertInstanceOf(Coordinate::class, $entity->getCoordinate());
    }
}