<?php

namespace LaunchpadHooks\Traits;

use LaunchpadHooks\Action;

trait ActionAware
{
    /**
     * @var Action
     */
    protected $action;

    public function set_action(Action $action): void
    {
        $this->action = $action;
    }
}