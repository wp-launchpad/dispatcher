<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Dispatcher;

use LaunchpadDispatcher\Dispatcher;
use LaunchpadDispatcher\Tests\Integration\TestCase;
use LaunchpadDispatcher\Tests\Integration\Traits\SetupDispatcherTrait;

/**
 * @covers \LaunchpadDispatcher\Dispatcher::apply_bool_filter
 */
class Test_applyBoolFilter extends TestCase {
    use SetupDispatcherTrait;

    protected $configs;

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected( $config, $expected )
    {
        $this->configs = $config;
        $dispatcher = $this->setup_dispatcher();
        $this->assertSame($expected, $dispatcher->apply_bool_filters('test', $config['initial_value']));
    }

    /**
     * @hook test
     */
    public function filter_callback()
    {
        return $this->configs['value'];
    }
}
