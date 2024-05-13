<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Integration;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\Api\Method;
use ProgrammatorDev\OpenWeatherMap\Exception\BadRequestException;
use ProgrammatorDev\OpenWeatherMap\Exception\NotFoundException;
use ProgrammatorDev\OpenWeatherMap\Exception\TooManyRequestsException;
use ProgrammatorDev\OpenWeatherMap\Exception\UnauthorizedException;
use ProgrammatorDev\OpenWeatherMap\Exception\UnexpectedErrorException;
use ProgrammatorDev\OpenWeatherMap\Resource\Resource;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;
use ProgrammatorDev\OpenWeatherMap\Test\MockResponse;

class ResourceTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            public function request(): void
            {
                $this->api->request(
                    method: Method::GET,
                    path: '/test'
                );
            }
        };
    }

    #[DataProvider(methodName: 'provideApiErrorData')]
    public function testApiError(int $statusCode, string $exception): void
    {
        $this->mockClient->addResponse(new Response(
            status: $statusCode,
            body: MockResponse::API_ERROR
        ));

        $this->expectException($exception);
        $this->resource->request();
    }

    public static function provideApiErrorData(): \Generator
    {
        yield 'bad request' => [400, BadRequestException::class];
        yield 'unauthorized' => [401, UnauthorizedException::class];
        yield 'not found' => [404, NotFoundException::class];
        yield 'too many requests' => [429, TooManyRequestsException::class];
        yield 'unexpected error' => [500, UnexpectedErrorException::class];
    }
}