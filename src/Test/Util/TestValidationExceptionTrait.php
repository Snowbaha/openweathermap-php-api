<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Util;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\Validator\Exception\ValidationException;

trait TestValidationExceptionTrait
{
    #[DataProvider(methodName: 'provideValidationExceptionData')]
    public function testValidationException(string $resource, string $method, ?array $args = null): void
    {
        $this->expectException(ValidationException::class);
        $this->api->$resource()->$method(...$args);
    }

    abstract public static function provideValidationExceptionData(): \Generator;
}