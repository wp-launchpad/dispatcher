<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Dispatcher;

use LaunchpadDispatcher\Dispatcher;
use LaunchpadDispatcher\Tests\Integration\TestCase;

/**
 * @covers \LaunchpadDispatcher\Dispatcher::add_deprecated_action
 */
class Test_addDeprecatedAction extends TestCase {

    protected $called = false;

    public function testShouldDoAsExpected()
    {
        $this->expected_deprecated = [
            'deprecated-hook'
        ];
        $this->called = false;
        $dispatcher = $this->get_container()->get(Dispatcher::class);
        $dispatcher->add_deprecated_action('hook', 'deprecated-hook', '1.2');
        $dispatcher->do_action('hook');
        $this->assertTrue($this->called);
    }

    /**
     * @hook deprecated-hook
     */
    public function old_callback()
    {
        $this->called = true;
    }
}
