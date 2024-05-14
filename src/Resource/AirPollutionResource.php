<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource;

use ProgrammatorDev\Api\Method;
use ProgrammatorDev\OpenWeatherMap\Entity\AirPollution\AirPollution;
use ProgrammatorDev\OpenWeatherMap\Entity\AirPollution\AirPollutionCollection;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class AirPollutionResource extends Resource
{
    /**
     * Get access to current air pollution data
     *
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getCurrent(float $latitude, float $longitude): AirPollution
    {
        $this->validateCoordinate($latitude, $longitude);

        $data = $this->api->request(
            method: Method::GET,
            path: '/data/2.5/air_pollution',
            query: [
                'lat' => $latitude,
                'lon' => $longitude,
            ]
        );

        return new AirPollution($data);
    }

    /**
     * Get access to air pollution forecast data per hour
     *
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getForecast(float $latitude, float $longitude): AirPollutionCollection
    {
        $this->validateCoordinate($latitude, $longitude);

        $data = $this->api->request(
            method: Method::GET,
            path: '/data/2.5/air_pollution/forecast',
            query: [
                'lat' => $latitude,
                'lon' => $longitude,
            ]
        );

        return new AirPollutionCollection($data);
    }

    /**
     * Get access to historical air pollution data per hour between two dates
     *
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getHistory(
        float $latitude,
        float $longitude,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate
    ): AirPollutionCollection
    {
        $this->validateCoordinate($latitude, $longitude);
        $this->validateDateOrder($startDate, $endDate);

        $utcTimezone = new \DateTimeZone('UTC');

        $data = $this->api->request(
            method: Method::GET,
            path: '/data/2.5/air_pollution/history',
            query: [
                'lat' => $latitude,
                'lon' => $longitude,
                'start' => $startDate->setTimezone($utcTimezone)->getTimestamp(),
                'end' => $endDate->setTimezone($utcTimezone)->getTimestamp()
            ]
        );

        return new AirPollutionCollection($data);
    }
}