<?php

namespace LaunchpadDispatcher\Sanitizers;

use LaunchpadDispatcher\Interfaces\SanitizerInterface;
use LaunchpadDispatcher\Traits\IsDefault;

class StringSanitizer implements SanitizerInterface
{
    use IsDefault;

    public function sanitize($value)
    {
        if ( is_object($value) && ! method_exists($value, '__toString')) {
            return false;
        }

        if (is_array($value)) {
            return false;
        }

        return (string) $value;
    }
}