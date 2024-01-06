<?php

namespace LaunchpadHooks\Sanitizers;

use LaunchpadHooks\Interfaces\SanitizerInterface;
use LaunchpadHooks\Traits\IsDefault;

class BoolSanitizer implements SanitizerInterface {

    use IsDefault;

    public function sanitize($value)
    {
        return (bool) $value;
    }
}