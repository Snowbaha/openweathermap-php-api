<?php

namespace ProgrammatorDev\OpenWeatherMap\Entity;

class Location
{
    private Coordinate $coordinate;

    private ?int $id;

    private ?string $name;

    private ?string $state;

    private ?string $countryCode;

    private ?array $localNames;

    private ?int $population;

    private ?Timezone $timezone;

    private ?\DateTimeImmutable $sunriseAt;

    private ?\DateTimeImmutable $sunsetAt;

    public function __construct(array $data)
    {
        $this->coordinate = new Coordinate([
            'lat' => $data['lat'],
            'lon' => $data['lon']
        ]);

        // set no null if it is 0
        $this->id = !empty($data['id'])
            ? $data['id']
            : null;

        // set to null if it is an empty string
        $this->name = !empty($data['name'])
            ? $data['name']
            : null;

        $this->state = $data['state'] ?? null;

        // set to null if it is an empty string
        $this->countryCode = !empty($data['country'])
            ? $data['country']
            : null;

        $this->localNames = $data['local_names'] ?? null;

        // set to null if it is 0
        $this->population = !empty($data['population'])
            ? $data['population']
            : null;

        $this->timezone = isset($data['timezone_offset'])
            ? new Timezone(['timezone_offset' => $data['timezone_offset']])
            : null;

        $this->sunriseAt = isset($data['sunrise'])
            ? \DateTimeImmutable::createFromFormat('U', $data['sunrise'])
            : null;

        $this->sunsetAt = isset($data['sunset'])
            ? \DateTimeImmutable::createFromFormat('U', $data['sunset'])
            : null;
    }

    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function getTimezone(): ?Timezone
    {
        return $this->timezone;
    }

    /**
     * Sunrise date in UTC
     */
    public function getSunriseAt(): ?\DateTimeImmutable
    {
        return $this->sunriseAt;
    }

    /**
     * Sunset date in UTC
     */
    public function getSunsetAt(): ?\DateTimeImmutable
    {
        return $this->sunsetAt;
    }
}