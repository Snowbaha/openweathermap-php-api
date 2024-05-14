<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\OneCall;

use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\Alert;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class AlertTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Alert([
            'sender_name' => 'sender name',
            'event' => 'event name',
            'start' => 1715561801,
            'end' => 1715616968,
            'description' => 'description',
            'tags' => ['tag1', 'tag2']
        ]);

        $this->assertSame('sender name', $entity->getSenderName());
        $this->assertSame('event name', $entity->getEventName());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStartsAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getEndsAt());
        $this->assertSame('description', $entity->getDescription());
        $this->assertSame(['tag1', 'tag2'], $entity->getTags());
    }
}