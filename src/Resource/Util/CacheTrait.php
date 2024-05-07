<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource\Util;

use function DeepCopy\deep_copy;

trait CacheTrait
{
    public function withCacheTtl(?int $ttl): static
    {
        $clone = deep_copy($this);
        $clone->api->getCacheBuilder()?->setTtl($ttl);

        return $clone;
    }
}