<?php

namespace LaunchpadHooks\Tests\Integration\inc\Dispatcher;

use LaunchpadHooks\Dispatcher;
use LaunchpadHooks\Tests\Integration\TestCase;

/**
 * @covers \LaunchpadHooks\Dispatcher::do_action
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
