<?php

namespace LaunchpadHooks\Tests\Integration;

use Psr\Container\ContainerInterface;

trait UseContainer
{
    public function get_container(): ContainerInterface
    {
        $parameters = [
            'prefix' => 'test',
            'version' => '3.16'
        ];
        return apply_filters("{$parameters['prefix']}container", null);
    }
}