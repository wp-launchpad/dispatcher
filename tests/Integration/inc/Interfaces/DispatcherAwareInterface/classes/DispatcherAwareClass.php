<?php

namespace LaunchpadHooks\Tests\Integration\inc\Interfaces\DispatcherAwareInterface\classes;

use LaunchpadHooks\Interfaces\DispatcherAwareInterface;
use LaunchpadHooks\Traits\DispatcherAware;

class DispatcherAwareClass implements DispatcherAwareInterface
{
    use DispatcherAware;
}