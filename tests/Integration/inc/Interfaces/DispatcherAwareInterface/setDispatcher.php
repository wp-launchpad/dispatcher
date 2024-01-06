<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Interfaces\DispatcherAwareInterface;

use LaunchpadDispatcher\Dispatcher;
use LaunchpadDispatcher\Tests\Integration\inc\Interfaces\DispatcherAwareInterface\classes\DispatcherAwareClass;
use LaunchpadDispatcher\Tests\Integration\TestCase;
use ReflectionClass;

/**
 * @covers \LaunchpadDispatcher\Interfaces\DispatcherAwareInterface::set_dispatcher
 */
class Test_setDispatcher extends TestCase {

    public function testShouldDoAsExpected()
    {
        $this->get_league_container()->add(DispatcherAwareClass::class);
        $class = $this->get_container()->get(DispatcherAwareClass::class);

        $reflectionClass = new ReflectionClass(DispatcherAwareClass::class);
        $dispatcher = $reflectionClass->getProperty('dispatcher')->getValue($class);
        $this->assertInstanceOf(Dispatcher::class, $dispatcher);
    }
}
