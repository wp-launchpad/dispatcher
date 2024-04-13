<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Dispatcher;

use LaunchpadDispatcher\Dispatcher;
use LaunchpadDispatcher\Interfaces\SanitizerInterface;
use LaunchpadDispatcher\Tests\Integration\TestCase;
use LaunchpadDispatcher\Tests\Integration\Traits\SetupDispatcherTrait;
use LaunchpadDispatcher\Traits\IsDefault;

/**
 * @covers \LaunchpadDispatcher\Dispatcher::apply_filters
 */
class Test_applyFilters extends TestCase {
    use SetupDispatcherTrait;

    protected $configs;

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected( $config, $expected )
    {
        $this->configs = $config;
        $dispatcher = $this->setup_dispatcher();
        $this->assertSame($expected, $dispatcher->apply_filters('test', new class implements SanitizerInterface {
            use IsDefault;
            public function sanitize($value)
            {
                if('invalid' === $value) {
                    return false;
                }

                return (int) $value;
            }
        }, $config['initial_value']));
    }

    /**
     * @hook test
     */
    public function filter_callback()
    {
        return $this->configs['value'];
    }
}
