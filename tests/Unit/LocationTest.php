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
            'id' => 100,
            'name' => 'name',
            'state' => 'state',
            'country' => 'PT',
            'local_names' => [
                'en' => 'local name'
            ],
            'population' => 100,
            'timezone_offset' => 0,
            'sunrise' => 1661834187,
            'sunset' => 1661882248
        ]);

        $this->assertInstanceOf(Coordinate::class, $entity->getCoordinate());
        $this->assertSame(100, $entity->getId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('state', $entity->getState());
        $this->assertSame('PT', $entity->getCountryCode());

        $this->assertSame(['en' => 'local name'], $entity->getLocalNames());
        $this->assertSame('local name', $entity->getLocalName('en'));
        $this->assertSame(null, $entity->getLocalName('pt'));

        $this->assertSame(100, $entity->getPopulation());
        $this->assertInstanceOf(Timezone::class, $entity->getTimezone());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getSunriseAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getSunsetAt());
    }
}