<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Interfaces\DispatcherAwareInterface\classes;

use LaunchpadDispatcher\Interfaces\DispatcherAwareInterface;
use LaunchpadDispatcher\Traits\DispatcherAware;

class DispatcherAwareClass implements DispatcherAwareInterface
{
    use DispatcherAware;
}