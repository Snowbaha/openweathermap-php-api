<?php

namespace ProgrammatorDev\OpenWeatherMap\Test;

use Http\Mock\Client;
use PHPUnit\Framework\TestCase;
use ProgrammatorDev\Api\Builder\ClientBuilder;
use ProgrammatorDev\OpenWeatherMap\OpenWeatherMap;

class AbstractTest extends TestCase
{
    protected const API_KEY = 'testapikey';

    protected OpenWeatherMap $api;

    protected Client $mockClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockClient = new Client();

        $this->api = new OpenWeatherMap(self::API_KEY);
        $this->api->setClientBuilder(new ClientBuilder($this->mockClient));
    }
}