<?php

namespace LaunchpadDispatcher\Sanitizers;

use LaunchpadDispatcher\Interfaces\SanitizerInterface;

class SafeSanitizer implements SanitizerInterface
{
    /**
     * Original value from the filter.
     *
     * @var string
     */
    protected $original_type;

    protected $invalid = false;

    /**
     * Instantiate sanitizer.
     *
     * @param string $original_type Original value from the filter.
     */
    public function __construct( string $original_type)
    {
        $this->original_type = $original_type;
    }


    /**
     * @inheritDoc
     */
    public function sanitize($value)
    {
        if( $this->original_type !== gettype($value) ) {
            $this->invalid = true;
            return false;
        }

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function is_default($value, $original): bool
    {
        return $this->invalid;
    }
}