<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Integration;

use ProgrammatorDev\OpenWeatherMap\Resource\Resource;
use ProgrammatorDev\OpenWeatherMap\Resource\Util\UnitSystemTrait;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;
use ProgrammatorDev\Validator\Exception\ValidationException;

class UnitSystemTraitTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            use UnitSystemTrait;

            public function getUnitSystem(): string
            {
                return $this->api->getQueryDefault('units');
            }
        };
    }

    public function testMethods(): void
    {
        $this->assertSame('imperial', $this->resource->withUnitSystem('imperial')->getUnitSystem());
        $this->assertSame('metric', $this->resource->getUnitSystem()); // back to default value
    }

    public function testValidationException(): void
    {
        $this->expectException(ValidationException::class);
        $this->resource->withUnitSystem('invalid');
    }
}