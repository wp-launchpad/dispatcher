<?php

namespace LaunchpadDispatcher\Interfaces;

use LaunchpadDispatcher\Dispatcher;

interface DispatcherAwareInterface
{
    public function set_dispatcher(Dispatcher $dispatcher): void;
}