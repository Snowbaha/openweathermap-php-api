<?php

namespace ProgrammatorDev\OpenWeatherMap\Util;

trait ReflectionTrait
{
    private function getClassConstants(string $className): array
    {
        $class = new \ReflectionClass($className);
        $constants = $class->getConstants();

        // Sort by alphabetical order
        // to be more intuitive when listing values for error messages
        \asort($constants);

        return $constants;
    }
}