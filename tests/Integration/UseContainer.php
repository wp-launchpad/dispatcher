<?php

namespace LaunchpadDispatcher\Tests\Integration;

use League\Container\Container;
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

    public function get_league_container(): Container
    {
        $parameters = [
            'prefix' => 'test',
            'version' => '3.16'
        ];
        return apply_filters("{$parameters['prefix']}container", null);
    }
}