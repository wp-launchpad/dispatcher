<?php

namespace LaunchpadHooks;

interface SanitizerInterface
{
    public function sanitize($value);

    public function get_default();
}