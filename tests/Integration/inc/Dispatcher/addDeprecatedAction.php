<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Dispatcher;

use LaunchpadDispatcher\Dispatcher;
use LaunchpadDispatcher\Tests\Integration\TestCase;
use LaunchpadDispatcher\Tests\Integration\Traits\SetupDispatcherTrait;

/**
 * @covers \LaunchpadDispatcher\Dispatcher::add_deprecated_action
 */
class Test_addDeprecatedAction extends TestCase {

    use SetupDispatcherTrait;

    protected $called = false;

    public function testShouldDoAsExpected()
    {
        $this->expected_deprecated = [
            'deprecated-hook'
        ];
        $this->called = false;
        $dispatcher = $this->setup_dispatcher();
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
