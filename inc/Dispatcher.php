<?php

namespace LaunchpadHooks;

use LaunchpadHooks\Interfaces\SanitizerInterface;
use LaunchpadHooks\Sanitizers\BoolSanitizer;
use LaunchpadHooks\Sanitizers\FloatSanitizer;
use LaunchpadHooks\Sanitizers\IntSanitizer;
use LaunchpadHooks\Sanitizers\StringSanitizer;

class Dispatcher
{
    public function do_action(string $name, ...$parameters)
    {
        do_action($name, ...$parameters);
    }

    public function apply_filters(string $name, SanitizerInterface $sanitizer, $default, ...$parameters)
    {
        $result = apply_filters($name, $default, ...$parameters);

        $sanitized_result = $sanitizer->sanitize($result);

        if( false === $sanitized_result && $sanitizer->is_default($sanitized_result, $result) ) {
            return $default;
        }

        return $sanitized_result;
    }

    public function apply_string_filters(string $name, string $default, ...$parameters): string
    {
        return $this->apply_filters($name, new StringSanitizer(), $default, ...$parameters);
    }

    public function apply_bool_filters(string $name, bool $default, ...$parameters): bool
    {
        return $this->apply_filters($name, new BoolSanitizer(), $default, ...$parameters);
    }

    public function apply_int_filters(string $name, int $default, ...$parameters): int
    {
        return $this->apply_filters($name, new IntSanitizer(), $default, ...$parameters);
    }

    public function apply_float_filters(string $name, float $default, ...$parameters): float
    {
        return $this->apply_filters($name, new FloatSanitizer(), $default, ...$parameters);
    }
}