<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit;

use ProgrammatorDev\OpenWeatherMap\Entity\Wind;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class WindTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Wind([
            'speed' => 100,
            'deg' => 100,
            'gust' => 100
        ]);

        $this->assertSame(100.0, $entity->getSpeed());
        $this->assertSame(100, $entity->getDirection());
        $this->assertSame(100.0, $entity->getGust());
    }
}