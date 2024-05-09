<?php

namespace ProgrammatorDev\OpenWeatherMap\Entity\AirPollution;

use ProgrammatorDev\OpenWeatherMap\Entity\Coordinate;

class AirPollution extends AirPollutionData
{
    private Coordinate $coordinate;

    public function __construct(array $data)
    {
        parent::__construct($data['list'][0]);

        $this->coordinate = new Coordinate($data['coord']);
    }

    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }
}