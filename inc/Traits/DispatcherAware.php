<?php

namespace LaunchpadHooks\Traits;

use LaunchpadHooks\Dispatcher;

trait DispatcherAware
{
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    public function set_dispatcher(Dispatcher $dispatcher): void
    {
        $this->dispatcher = $dispatcher;
    }
}