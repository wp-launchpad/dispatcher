<?php

namespace LaunchpadDispatcher\Tests\Integration\Traits;

use LaunchpadDispatcher\Dispatcher;

trait SetupDispatcherTrait
{
    public function setup_dispatcher(): Dispatcher
    {
        return new Dispatcher();
    }
}