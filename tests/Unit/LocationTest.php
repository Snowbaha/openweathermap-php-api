<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit;

use ProgrammatorDev\OpenWeatherMap\Entity\Coordinate;
use ProgrammatorDev\OpenWeatherMap\Entity\Location;
use ProgrammatorDev\OpenWeatherMap\Entity\Timezone;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class LocationTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Location([
            'lat' => 50,
            'lon' => 50,
            'id' => 123,
            'name' => 'name',
            'state' => 'state',
            'country' => 'co',
            'local_names' => [
                'en' => 'local name'
            ],
            'timezone_offset' => 0,
            'sunrise' => 1661834187,
            'sunset' => 1661882248
        ]);

        $this->assertInstanceOf(Coordinate::class, $entity->getCoordinate());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('state', $entity->getState());
        $this->assertSame('co', $entity->getCountryCode());
        $this->assertSame(['en' => 'local name'], $entity->getLocalNames());
        $this->assertSame('local name', $entity->getLocalName('en'));
        $this->assertSame(null, $entity->getLocalName('pt'));
        $this->assertInstanceOf(Timezone::class, $entity->getTimezone());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getSunriseAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getSunsetAt());
    }
}