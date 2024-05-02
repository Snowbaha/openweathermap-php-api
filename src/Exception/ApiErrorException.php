<?php

namespace ProgrammatorDev\OpenWeatherMap\Exception;

class ApiErrorException extends \Exception
{
    private ?array $parameters;

    public function __construct(array $error)
    {
        parent::__construct($error['message'], $error['cod']);

        $this->parameters = $error['parameters'] ?? null;
    }

    public function getParameters(): ?array
    {
        return $this->parameters;
    }
}