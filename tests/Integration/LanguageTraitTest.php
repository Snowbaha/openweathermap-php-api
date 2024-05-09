<?php

namespace Integration;

use ProgrammatorDev\OpenWeatherMap\Resource\Resource;
use ProgrammatorDev\OpenWeatherMap\Resource\Util\LanguageTrait;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;
use ProgrammatorDev\Validator\Exception\ValidationException;

class LanguageTraitTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            use LanguageTrait;

            public function getLanguage(): string
            {
                return $this->api->getQueryDefault('lang');
            }
        };
    }

    public function testMethods(): void
    {
        $this->assertSame('pt', $this->resource->withLanguage('pt')->getLanguage());
        $this->assertSame('en', $this->resource->getLanguage()); // back to default value
    }

    public function testValidationException(): void
    {
        $this->expectException(ValidationException::class);
        $this->resource->withLanguage('invalid');
    }
}