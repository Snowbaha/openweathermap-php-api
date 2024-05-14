<?php

namespace ProgrammatorDev\OpenWeatherMap\Entity\Weather;

use ProgrammatorDev\OpenWeatherMap\Entity\Location;
use ProgrammatorDev\OpenWeatherMap\Util\EntityTrait;

class WeatherCollection
{
    use EntityTrait;

    private int $numResults;

    private Location $location;

    /** @var WeatherData[] */
    private array $data;

    public function __construct(array $data)
    {
        $this->numResults = $data['cnt'];

        $this->location = new Location([
            'lat' => $data['city']['coord']['lat'],
            'lon' => $data['city']['coord']['lon'],
            'id' => $data['city']['id'] ?? null,
            'name' => $data['city']['name'] ?? null,
            'country' => $data['city']['country'] ?? null,
            'population' => $data['city']['population'] ?? null,
            'sunrise' => $data['city']['sunrise'],
            'sunset' => $data['city']['sunset'],
            'timezone_offset' => $data['city']['timezone']
        ]);

        $this->data = $this->createEntityList(WeatherData::class, $data['list']);
    }

    public function getNumResults(): int
    {
        return $this->numResults;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getData(): array
    {
        return $this->data;
    }
}