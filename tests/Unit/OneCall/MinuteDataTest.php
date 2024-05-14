<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\OneCall;

use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\MinuteData;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class MinuteDataTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new MinuteData([
            'dt' => 1715561801,
            'precipitation' => 1,
        ]);

        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getDateTime());
        $this->assertSame(1.0, $entity->getPrecipitation());
    }
}