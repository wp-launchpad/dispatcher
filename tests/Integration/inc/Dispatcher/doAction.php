<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Dispatcher;

use LaunchpadDispatcher\Dispatcher;
use LaunchpadDispatcher\Tests\Integration\TestCase;

/**
 * @covers \LaunchpadDispatcher\Dispatcher::do_action
 */
class Test_doAction extends TestCase {


    protected $called = false;

    public function testShouldDoAsExpected()
    {
        $this->called = false;
        $dispatcher = $this->get_container()->get(Dispatcher::class);
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
