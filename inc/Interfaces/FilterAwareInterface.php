<?php

namespace LaunchpadHooks\Interfaces;

use LaunchpadHooks\Filter;

interface FilterAwareInterface
{
    public function set_filter(Filter $filter): void;
}