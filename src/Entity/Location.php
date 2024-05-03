<?php

namespace ProgrammatorDev\OpenWeatherMap\Entity;

class Location
{
    private ?string $name;

    private ?string $state;

    private ?string $countryCode;

    private ?array $localNames;

    private ?string $zipCode;

    private Coordinate $coordinate;

    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->state = $data['state'] ?? null;
        $this->countryCode = $data['country'] ?? null;
        $this->localNames = $data['local_names'] ?? null;
        $this->zipCode = $data['zip'] ?? null;
        $this->coordinate = new Coordinate(['lat' => $data['lat'], 'lon' => $data['lon']]);
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function getLocalNames(): ?array
    {
        return $this->localNames;
    }

    public function getLocalName(string $countryCode): ?string
    {
        $countryCode = strtolower($countryCode);

        return $this->localNames[$countryCode] ?? null;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }
}