<?php
namespace Launchpad\Tests\Integration;
use WPMedia\PHPUnit\BootstrapManager;

define( 'LAUNCHPAD_PLUGIN_ROOT', dirname( dirname( __DIR__ ) ) . DIRECTORY_SEPARATOR );
define( 'LAUNCHPAD_TESTS_FIXTURES_DIR', dirname( __DIR__ ) . '/Fixtures' );
define( 'LAUNCHPAD_TESTS_DIR', __DIR__ );
define( 'LAUNCHPAD_IS_TESTING', true );

use LaunchpadCore\EventManagement\EventManager;
use LaunchpadCore\EventManagement\Wrapper\SubscriberWrapper;
use LaunchpadCore\Plugin;
use LaunchpadDispatcher\ServiceProvider;
use League\Container\Container;

// Manually load the plugin being tested.
tests_add_filter(
    'muplugins_loaded',
    function() {

        if ( BootstrapManager::isGroup( '' ) ) {
            // TODO: add your logic from .
        }

        $plugin = new Plugin(new Container(), new EventManager(), new SubscriberWrapper('test'));
        $plugin->load([
            'prefix' => 'test',
            'version' => '3.16'
        ], [
            ServiceProvider::class,
        ]);
    }
);