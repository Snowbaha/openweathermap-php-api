<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit;

use ProgrammatorDev\OpenWeatherMap\Entity\Timezone;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class TimezoneTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Timezone([
            'timezone' => 'UTC',
            'timezone_offset' => 0
        ]);

        $this->assertSame('UTC', $entity->getIdentifier());
        $this->assertSame(0, $entity->getOffset());
    }
}