<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource\Util;

use function DeepCopy\deep_copy;

trait LanguageTrait
{
    public function withLanguage(string $language): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('lang', $language);

        return $clone;
    }
}