<?php

namespace ProgrammatorDev\OpenWeatherMap\Entity\OneCall;

class MinuteData
{
    private \DateTimeImmutable $dateTime;

    private float $precipitation;

    public function __construct(array $data)
    {
        $this->dateTime = \DateTimeImmutable::createFromFormat('U', $data['dt']);
        $this->precipitation = $data['precipitation'];
    }

    /**
     * DateTime in UTC
     */
    public function getDateTime(): \DateTimeImmutable
    {
        return $this->dateTime;
    }

    public function getPrecipitation(): float
    {
        return $this->precipitation;
    }
}