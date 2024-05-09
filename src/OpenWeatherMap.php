<?php

namespace ProgrammatorDev\OpenWeatherMap;

use Http\Message\Authentication\QueryParam;
use ProgrammatorDev\Api\Api;
use ProgrammatorDev\Api\Event\PostRequestEvent;
use ProgrammatorDev\Api\Event\ResponseContentsEvent;
use ProgrammatorDev\OpenWeatherMap\Exception\BadRequestException;
use ProgrammatorDev\OpenWeatherMap\Exception\NotFoundException;
use ProgrammatorDev\OpenWeatherMap\Exception\TooManyRequestsException;
use ProgrammatorDev\OpenWeatherMap\Exception\UnauthorizedException;
use ProgrammatorDev\OpenWeatherMap\Exception\UnexpectedErrorException;
use ProgrammatorDev\OpenWeatherMap\Language\Language;
use ProgrammatorDev\OpenWeatherMap\Resource\GeocodingResource;
use ProgrammatorDev\OpenWeatherMap\Resource\WeatherResource;
use ProgrammatorDev\OpenWeatherMap\UnitSystem\UnitSystem;

class OpenWeatherMap extends Api
{
    private array $options;

    public function __construct(
        #[\SensitiveParameter] private string $apiKey,
        array $options = []
    )
    {
        parent::__construct();

        $this->options = $this->configureOptions($options);
        $this->configureApi();
    }

    public function weather(): WeatherResource
    {
        return new WeatherResource($this);
    }

    public function geocoding(): GeocodingResource
    {
        return new GeocodingResource($this);
    }

//    public function config(): Config
//    {
//        return $this->config;
//    }

//    public function oneCall(): OneCallEndpoint
//    {
//        return new OneCallEndpoint($this);
//    }
//
//    public function airPollution(): AirPollutionEndpoint
//    {
//        return new AirPollutionEndpoint($this);
//    }

    private function configureOptions(array $options): array
    {
        $this->optionsResolver->setDefault('unitSystem', UnitSystem::METRIC);
        $this->optionsResolver->setDefault('language', Language::ENGLISH);

        $this->optionsResolver->setAllowedTypes('unitSystem', 'string');
        $this->optionsResolver->setAllowedTypes('language', 'string');

        $this->optionsResolver->setAllowedValues('unitSystem', UnitSystem::getOptions());
        $this->optionsResolver->setAllowedValues('language', Language::getOptions());

        return $this->optionsResolver->resolve($options);
    }

    private function configureApi(): void
    {
        $this->setBaseUrl('https://api.openweathermap.org');

        $this->setAuthentication(new QueryParam(['appid' => $this->apiKey]));

        $this->addQueryDefault('units', $this->options['unitSystem']);
        $this->addQueryDefault('lang', $this->options['language']);

        $this->addPostRequestHandler(function(PostRequestEvent $event) {
            $response = $event->getResponse();
            $statusCode = $response->getStatusCode();

            // if there was a response with an error status code
            if ($statusCode >= 400) {
                $error = \json_decode($response->getBody()->getContents(), true);

                match ($statusCode) {
                    400 => throw new BadRequestException($error),
                    401 => throw new UnauthorizedException($error),
                    404 => throw new NotFoundException($error),
                    429 => throw new TooManyRequestsException($error),
                    default => throw new UnexpectedErrorException($error)
                };
            }
        });

        $this->addResponseContentsHandler(function(ResponseContentsEvent $event) {
            // decode json string response into an array
            $contents = $event->getContents();
            $contents = \json_decode($contents, true);

            $event->setContents($contents);
        });
    }
}