<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit;

use ProgrammatorDev\OpenWeatherMap\Entity\Condition;
use ProgrammatorDev\OpenWeatherMap\Entity\Icon;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class ConditionTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Condition([
            'id' => 200,
            'main' => 'name',
            'description' => 'description',
            'icon' => '01d'
        ]);

        $this->assertSame(200, $entity->getId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('description', $entity->getDescription());
        $this->assertInstanceOf(Icon::class, $entity->getIcon());
        $this->assertSame('THUNDERSTORM', $entity->getSystemName());
    }
}