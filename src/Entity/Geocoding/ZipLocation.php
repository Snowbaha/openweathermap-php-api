<?php

namespace ProgrammatorDev\OpenWeatherMap\Entity\Geocoding;

use ProgrammatorDev\OpenWeatherMap\Entity\Coordinate;

class ZipLocation
{
    private string $zipCode;

    private string $name;

    private string $countryCode;

    private Coordinate $coordinate;

    public function __construct(array $data)
    {
        $this->zipCode = $data['zip'];
        $this->name = $data['name'];
        $this->countryCode = $data['country'];

        $this->coordinate = new Coordinate([
            'lat' => $data['lat'],
            'lon' => $data['lon']
        ]);
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }
}