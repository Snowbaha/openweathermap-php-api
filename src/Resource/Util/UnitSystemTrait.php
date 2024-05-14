<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource\Util;

use ProgrammatorDev\Validator\Exception\ValidationException;
use function DeepCopy\deep_copy;

trait UnitSystemTrait
{
    use ValidationTrait;

    /**
     * @throws ValidationException
     */
    public function withUnitSystem(string $unitSystem): static
    {
        $this->validateUnitSystem($unitSystem);

        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('units', $unitSystem);

        return $clone;
    }
}