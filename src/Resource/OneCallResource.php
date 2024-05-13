<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource;

use ProgrammatorDev\Api\Method;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\Weather;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\WeatherMoment;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\WeatherSummary;
use ProgrammatorDev\OpenWeatherMap\Resource\Util\LanguageTrait;
use ProgrammatorDev\OpenWeatherMap\Resource\Util\UnitSystemTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class OneCallResource extends Resource
{
    use LanguageTrait;
    use UnitSystemTrait;

    /**
     * Get access to current weather, minute forecast for 1 hour, hourly forecast for 48 hours,
     * daily forecast for 8 days and government weather alerts
     *
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getWeather(float $latitude, float $longitude): Weather
    {
        $this->validateCoordinate($latitude, $longitude);

        $data = $this->api->request(
            method: Method::GET,
            path: '/data/3.0/onecall',
            query: [
                'lat' => $latitude,
                'lon' => $longitude,
            ]
        );

        return new Weather($data);
    }

    /**
     * Get access to weather data for any datetime
     *
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getWeatherByDate(float $latitude, float $longitude, \DateTimeInterface $dateTime): WeatherMoment
    {
        $this->validateCoordinate($latitude, $longitude);

        $utcTimezone = new \DateTimeZone('UTC');

        $data = $this->api->request(
            method: Method::GET,
            path: '/data/3.0/onecall/timemachine',
            query: [
                'lat' => $latitude,
                'lon' => $longitude,
                'dt' => $dateTime->setTimezone($utcTimezone)->getTimestamp()
            ]
        );

        return new WeatherMoment($data);
    }

    /**
     * Get access to aggregated weather data for a particular date
     *
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getWeatherSummaryByDate(float $latitude, float $longitude, \DateTimeInterface $date): WeatherSummary
    {
        $this->validateCoordinate($latitude, $longitude);

        $data = $this->api->request(
            method: Method::GET,
            path: '/data/3.0/onecall/day_summary',
            query: [
                'lat' => $latitude,
                'lon' => $longitude,
                'date' => $date->format('Y-m-d'),
                'tz' => $date->format('P')
            ]
        );

        return new WeatherSummary($data);
    }
}