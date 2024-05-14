<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit;

use ProgrammatorDev\OpenWeatherMap\Entity\Icon;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class IconTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Icon([
            'icon' => '01d'
        ]);

        $this->assertSame('01d', $entity->getId());
        $this->assertSame('https://openweathermap.org/img/wn/01d@4x.png', $entity->getUrl());
    }
}