<?php

namespace LaunchpadHooks\Tests\Integration\inc\Interfaces\DispatcherAwareInterface;

use LaunchpadHooks\Dispatcher;
use LaunchpadHooks\Tests\Integration\inc\Interfaces\DispatcherAwareInterface\classes\DispatcherAwareClass;
use LaunchpadHooks\Tests\Integration\TestCase;
use ReflectionClass;

/**
 * @covers \LaunchpadHooks\Interfaces\DispatcherAwareInterface::set_dispatcher
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
