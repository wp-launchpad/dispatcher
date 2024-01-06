<?php

namespace LaunchpadDispatcher\Interfaces;

interface SanitizerInterface
{
    public function sanitize($value);

    public function is_default($value, $original): bool;
}