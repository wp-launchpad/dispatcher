<?php

namespace LaunchpadHooks\Interfaces;

use LaunchpadHooks\Action;

interface ActionAwareInterface
{
    public function set_action(Action $action): void;
}