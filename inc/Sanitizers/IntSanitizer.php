<?php

namespace LaunchpadHooks\Sanitizers;

use LaunchpadHooks\Interfaces\SanitizerInterface;
use LaunchpadHooks\Traits\IsDefault;

class IntSanitizer implements SanitizerInterface {
    use IsDefault;

    public function sanitize($value)
    {
        return (int) $value;
    }
}