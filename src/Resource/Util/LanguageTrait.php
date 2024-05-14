<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource\Util;

use ProgrammatorDev\Validator\Exception\ValidationException;
use function DeepCopy\deep_copy;

trait LanguageTrait
{
    use ValidationTrait;

    /**
     * @throws ValidationException
     */
    public function withLanguage(string $language): static
    {
        $this->validateLanguage($language);

        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('lang', $language);

        return $clone;
    }
}