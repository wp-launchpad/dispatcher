<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Dispatcher;

use LaunchpadDispatcher\Dispatcher;
use LaunchpadDispatcher\Tests\Integration\TestCase;

/**
 * @covers \LaunchpadDispatcher\Dispatcher::add_deprecated_filter
 */
class Test_addDeprecatedFilter extends TestCase {

    protected $called = false;

    public function testShouldDoAsExpected()
    {
        $this->expected_deprecated = [
            'deprecated-hook'
        ];
        $this->called = false;
        $dispatcher = $this->get_container()->get(Dispatcher::class);
        $dispatcher->add_deprecated_filter('hook', 'deprecated-hook', '1.2');
        $result = $dispatcher->apply_string_filters('hook', 'inital');
        $this->assertTrue($this->called);
        $this->assertSame('called', $result);
    }

    /**
     * @hook deprecated-hook
     */
    public function old_callback()
    {
        $this->called = true;
        return 'called';
    }
}
