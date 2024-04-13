<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Dispatcher;

use LaunchpadDispatcher\Dispatcher;
use LaunchpadDispatcher\Tests\Integration\TestCase;
use LaunchpadDispatcher\Tests\Integration\Traits\SetupDispatcherTrait;

/**
 * @covers \LaunchpadDispatcher\Dispatcher::do_action
 */
class Test_doAction extends TestCase {
    use SetupDispatcherTrait;


    protected $called = false;

    public function testShouldDoAsExpected()
    {
        $this->called = false;
        $dispatcher = $this->setup_dispatcher();
        $dispatcher->do_action('test');
        $this->assertTrue($this->called);
    }

    /**
     * @hook test
     */
    public function filter_callback()
    {
        $this->called = true;
    }
}
