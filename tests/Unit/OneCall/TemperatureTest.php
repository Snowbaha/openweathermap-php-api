<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\OneCall;

use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\Temperature;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class TemperatureTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Temperature([
            'morn' => 10,
            'day' => 15,
            'eve' => 15,
            'night' => 10,
            'min' => 10,
            'max' => 15,
        ]);

        $this->assertSame(10.0, $entity->getMorning());
        $this->assertSame(15.0, $entity->getDay());
        $this->assertSame(15.0, $entity->getEvening());
        $this->assertSame(10.0, $entity->getNight());
        $this->assertSame(10.0, $entity->getMin());
        $this->assertSame(15.0, $entity->getMax());
    }
}