<?php

namespace LaunchpadDispatcher\Sanitizers;

use LaunchpadDispatcher\Interfaces\SanitizerInterface;

class SafeSanitizer implements SanitizerInterface
{
    protected $original_type;

    /**
     * @param $original_type
     */
    public function __construct($original_type)
    {
        $this->original_type = $original_type;
    }


    /**
     * @inheritDoc
     */
    public function sanitize($value)
    {
        if( $this->original_type !== gettype($value) ) {
            return false;
        }

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function is_default($value, $original): bool
    {
        return $this->original_type !== gettype($value);
    }
}