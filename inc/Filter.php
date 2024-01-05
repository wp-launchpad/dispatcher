<?php

namespace LaunchpadHooks;

class Filter
{
    public function apply_filters(string $name, SanitizerInterface $sanitizer, $default, ...$parameters)
    {
        $result = apply_filters($name, $default, ...$parameters);

        $sanitized_result = $sanitizer->sanitize($result);

        if( false === $sanitized_result ) {
            return $sanitizer->get_default();
        }

        return $sanitized_result;
    }
}