<?php

namespace ProgrammatorDev\OpenWeatherMap\UnitSystem;

use ProgrammatorDev\OpenWeatherMap\Util\ReflectionTrait;

class UnitSystem
{
    use ReflectionTrait;

    public const METRIC = 'metric';
    public const IMPERIAL = 'imperial';
    public const STANDARD = 'standard';

    public static function getOptions(): array
    {
        return (new UnitSystem)->getClassConstants(self::class);
    }
}