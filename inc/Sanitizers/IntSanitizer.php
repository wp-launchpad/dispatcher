<?php

namespace LaunchpadDispatcher\Sanitizers;

use LaunchpadDispatcher\Interfaces\SanitizerInterface;
use LaunchpadDispatcher\Traits\IsDefault;

class IntSanitizer implements SanitizerInterface {
    use IsDefault;

    public function sanitize($value)
    {
        return (int) $value;
    }
}