<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit;

use ProgrammatorDev\OpenWeatherMap\Entity\Coordinate;
use ProgrammatorDev\OpenWeatherMap\Entity\Location;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class LocationTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Location([
            'name' => 'Name',
            'state' => 'State',
            'country' => 'CO',
            'local_names' => [
                'en' => 'Local Name'
            ],
            'zip' => 'ZIP123',
            'lat' => 50,
            'lon' => 50
        ]);

        $this->assertSame('Name', $entity->getName());
        $this->assertSame('State', $entity->getState());
        $this->assertSame('CO', $entity->getCountryCode());
        $this->assertSame(['en' => 'Local Name'], $entity->getLocalNames());
        $this->assertSame('Local Name', $entity->getLocalName('en'));
        $this->assertSame(null, $entity->getLocalName('pt'));
        $this->assertSame('ZIP123', $entity->getZipCode());
        $this->assertInstanceOf(Coordinate::class, $entity->getCoordinate());
    }
}