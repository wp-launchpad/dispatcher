<?php

namespace LaunchpadDispatcher\Traits;

use LaunchpadDispatcher\Dispatcher;

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