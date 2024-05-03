<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource\Util;

use ProgrammatorDev\Validator\Exception\ValidationException;
use ProgrammatorDev\Validator\Validator;

trait ValidationTrait
{
    /**
     * @throws ValidationException
     */
    private function validateQuery(string $query, string $name): void
    {
        Validator::notBlank()->assert($query, $name);
    }

    /**
     * @throws ValidationException
     */
    private function validatePositive(int $number, string $name): void
    {
        Validator::greaterThan(0)->assert($number, $name);
    }

    /**
     * @throws ValidationException
     */
    private function validateCoordinate(float $latitude, float $longitude): void
    {
        Validator::range(-90, 90)->assert($latitude, 'latitude');
        Validator::range(-180, 180)->assert($longitude, 'longitude');
    }

    /**
     * @throws ValidationException
     */
    private function validateCountry(string $countryCode, string $name): void
    {
        Validator::country()->assert($countryCode, $name);
    }
}