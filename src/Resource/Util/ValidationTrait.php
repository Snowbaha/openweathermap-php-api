<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource\Util;

use ProgrammatorDev\OpenWeatherMap\Language\Language;
use ProgrammatorDev\OpenWeatherMap\UnitSystem\UnitSystem;
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
    private function validateCountryCode(string $countryCode): void
    {
        Validator::country()->assert($countryCode, 'countryCode');
    }

    /**
     * @throws ValidationException
     */
    private function validateLanguage(string $language): void
    {
        Validator::choice(Language::getOptions())->assert($language, 'language');
    }

    /**
     * @throws ValidationException
     */
    private function validateUnitSystem(string $unitSystem): void
    {
        Validator::choice(UnitSystem::getOptions())->assert($unitSystem, 'unitSystem');
    }

    /**
     * @throws ValidationException
     */
    private function validateDateOrder(\DateTimeInterface $startDate, \DateTimeInterface $endDate): void
    {
        Validator::greaterThan(
            constraint: $startDate,
            message: 'The endDate must be after the startDate.'
        )->assert($endDate);
    }
}