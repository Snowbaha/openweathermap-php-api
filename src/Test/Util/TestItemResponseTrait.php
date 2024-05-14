<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Util;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;

trait TestItemResponseTrait
{
    #[DataProvider(methodName: 'provideItemResponseData')]
    public function testItemResponse(
        string $responseClass,
        string $responseBody,
        string $resource,
        string $method,
        ?array $args = null
    ): void
    {
        $this->mockClient->addResponse(new Response(
            status: 200,
            body: $responseBody
        ));

        $response = $this->api->$resource()->$method(...$args);
        $this->assertInstanceOf($responseClass, $response);
    }

    abstract public static function provideItemResponseData(): \Generator;
}