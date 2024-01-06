<?php

namespace LaunchpadDispatcher\Tests\Integration\inc\Dispatcher;

use LaunchpadDispatcher\Dispatcher;
use LaunchpadDispatcher\Interfaces\SanitizerInterface;
use LaunchpadDispatcher\Tests\Integration\TestCase;
use LaunchpadDispatcher\Traits\IsDefault;

/**
 * @covers \LaunchpadDispatcher\Dispatcher::apply_filters
 */
class Test_applyFilters extends TestCase {

    protected $configs;

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected( $config, $expected )
    {
        $this->configs = $config;
        $filter = $this->get_container()->get(Dispatcher::class);
        $this->assertSame($expected, $filter->apply_filters('test', new class implements SanitizerInterface {
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
