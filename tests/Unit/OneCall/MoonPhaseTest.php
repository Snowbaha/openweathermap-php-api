<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\OneCall;

use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\MoonPhase;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class MoonPhaseTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new MoonPhase([
            'moon_phase' => 1
        ]);

        $this->assertSame(1.0, $entity->getValue());
        $this->assertSame('New Moon', $entity->getName());
        $this->assertSame('NEW_MOON', $entity->getSystemName());
    }
}