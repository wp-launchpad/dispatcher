<?php

namespace LaunchpadHooks\Tests\Integration\inc\Dispatcher;

use LaunchpadHooks\Dispatcher;
use LaunchpadHooks\Tests\Integration\TestCase;

/**
 * @covers \LaunchpadHooks\Dispatcher::apply_float_filter
 */
class Test_applyFloatFilter extends TestCase {

    protected $configs;

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected( $config, $expected )
    {
        $this->configs = $config;
        $filter = $this->get_container()->get(Dispatcher::class);
        $this->assertSame($expected, $filter->apply_float_filters('test', $config['initial_value']));
    }

    /**
     * @hook test
     */
    public function filter_callback()
    {
        return $this->configs['value'];
    }
}
