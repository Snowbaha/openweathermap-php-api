<?php

namespace ProgrammatorDev\OpenWeatherMap\Entity;

class Timezone
{
    private int $offset;

    private ?string $identifier;

    public function __construct(array $data)
    {
        $this->offset = $data['timezone_offset'];
        $this->identifier = $data['timezone'] ?? null;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
}