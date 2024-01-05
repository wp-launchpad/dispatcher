<?php

namespace LaunchpadHooks;

class Action
{
    public function do_action(string $name, ...$parameters)
    {
        do_action($name, ...$parameters);
    }
}