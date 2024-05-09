<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource;

use ProgrammatorDev\OpenWeatherMap\OpenWeatherMap;
use ProgrammatorDev\OpenWeatherMap\Resource\Util\CacheTrait;
use ProgrammatorDev\OpenWeatherMap\Resource\Util\ValidationTrait;

class Resource
{
    use CacheTrait;
    use ValidationTrait;

    public function __construct(protected OpenWeatherMap $api) {}
}