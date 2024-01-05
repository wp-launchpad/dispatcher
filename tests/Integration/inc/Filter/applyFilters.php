<?php

namespace LaunchpadHooks\Tests\Integration\inc\Filter;

use LaunchpadHooks\Filter;
use LaunchpadHooks\SanitizerInterface;
use LaunchpadHooks\Tests\Integration\TestCase;

/**
 * @covers \LaunchpadHooks\Filter::apply_filters
 */
class Test_applyFilters extends TestCase {

    protected $configs;

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected( $config, $expected )
    {
        $this->configs = $config;
        $filter = $this->get_container()->get(Filter::class);
        $this->assertSame($expected, $filter->apply_filters('test', new class implements SanitizerInterface {

            public function sanitize($value)
            {
                if('invalid' === $value) {
                    return false;
                }

                return (int) $value;
            }

            public function get_default()
            {
                return 'default';
            }
        }, $config['initial_value']));
    }

    /**
     * @hook test
     */
    public function test_callback()
    {
        return $this->configs['value'];
    }
}
