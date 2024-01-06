<?php

namespace LaunchpadDispatcher;

use LaunchpadCore\Container\AbstractServiceProvider;
use LaunchpadCore\Container\HasInflectorInterface;
use LaunchpadCore\Container\InflectorServiceProviderTrait;
use LaunchpadDispatcher\Interfaces\DispatcherAwareInterface;

class ServiceProvider extends AbstractServiceProvider implements HasInflectorInterface
{
    use InflectorServiceProviderTrait;

    protected function define()
    {
        $this->register_service(Dispatcher::class);
    }

    public function get_inflectors(): array
    {
        return [
            DispatcherAwareInterface::class => [
                'method' => 'set_dispatcher',
                'args' => [
                    Dispatcher::class
                ]
            ],
        ];
    }

}