<?php

namespace LaunchpadHooks\Traits;

trait IsDefault
{
    public function is_default($value, $original): bool
    {
        return $value !== $original;
    }
}