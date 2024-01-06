<?php

namespace LaunchpadHooks\Interfaces;

use LaunchpadHooks\Dispatcher;

interface DispatcherAwareInterface
{
    public function set_dispatcher(Dispatcher $dispatcher): void;
}