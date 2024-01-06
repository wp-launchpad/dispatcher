<?php

namespace LaunchpadHooks\Sanitizers;

use LaunchpadHooks\Interfaces\SanitizerInterface;
use LaunchpadHooks\Traits\IsDefault;

class FloatSanitizer implements SanitizerInterface {
    use IsDefault;

    public function sanitize($value)
    {
        return (float) $value;
    }

}