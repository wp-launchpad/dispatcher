<?php

namespace LaunchpadHooks;

use LaunchpadCore\Container\AbstractServiceProvider;
use LaunchpadCore\Container\HasInflectorInterface;
use LaunchpadCore\Container\InflectorServiceProviderTrait;
use LaunchpadHooks\Interfaces\ActionAwareInterface;
use LaunchpadHooks\Interfaces\FilterAwareInterface;

class ServiceProvider extends AbstractServiceProvider implements HasInflectorInterface
{
    use InflectorServiceProviderTrait;

    protected function define()
    {
        $this->register_service(Filter::class);
        $this->register_service(Action::class);
    }

    public function get_inflectors(): array
    {
        return [
            FilterAwareInterface::class => [
                'method' => 'set_filter',
                'args' => [
                    Filter::class
                ]
            ],
            ActionAwareInterface::class => [
                'method' => 'set_action',
                'args' => [
                    Action::class
                ]
            ]
        ];
    }

}