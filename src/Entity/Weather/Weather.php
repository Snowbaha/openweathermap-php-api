<?php

namespace ProgrammatorDev\OpenWeatherMap\Entity\Weather;

use ProgrammatorDev\OpenWeatherMap\Entity\Location;

class Weather extends WeatherData
{
    private Location $location;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->location = new Location([
            'lat' => $data['coord']['lat'],
            'lon' => $data['coord']['lon'],
            'id' => $data['id'] ?? null,
            'name' => $data['name'] ?? null,
            'country' => $data['sys']['country'] ?? null,
            'sunrise' => $data['sys']['sunrise'],
            'sunset' => $data['sys']['sunset'],
            'timezone_offset' => $data['timezone']
        ]);
    }

    public function getLocation(): Location
    {
        return $this->location;
    }
}