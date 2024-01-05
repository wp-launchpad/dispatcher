<?php

namespace LaunchpadHooks\Traits;

use LaunchpadHooks\Filter;

trait FilterAware
{
    /**
     * @var Filter
     */
    protected $filter;

    public function set_filter(Filter $filter): void
    {
        $this->filter = $filter;
    }
}