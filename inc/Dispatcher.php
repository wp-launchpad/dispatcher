<?php

namespace LaunchpadDispatcher;

use LaunchpadDispatcher\Interfaces\SanitizerInterface;
use LaunchpadDispatcher\Sanitizers\BoolSanitizer;
use LaunchpadDispatcher\Sanitizers\FloatSanitizer;
use LaunchpadDispatcher\Sanitizers\IntSanitizer;
use LaunchpadDispatcher\Sanitizers\StringSanitizer;

class Dispatcher {

	/**
	 * Deprecated filters.
	 *
	 * @var array
	 */
	protected $deprecated_filters = [];

	/**
	 * Deprecated actions.
	 *
	 * @var array
	 */
	protected $deprecated_actions = [];

	/**
	 * Do an action.
	 *
	 * @param string $name Name from the action.
	 *
	 * @param array  ...$parameters Parameters from the action.
	 *
	 * @return void
	 */
	public function do_action( string $name, ...$parameters ) {
		$this->call_deprecated_actions( $name, ...$parameters );
		do_action( $name, ...$parameters );
	}

	/**
	 * Apply filters.
	 *
	 * @param string             $name Name from the filter.
	 * @param SanitizerInterface $sanitizer Sanitizer from the filter.
	 * @param mixed              $default_value Default value from the filter.
	 * @param array              ...$parameters Parameters.
	 * @return mixed
	 */
	public function apply_filters( string $name, SanitizerInterface $sanitizer, $default_value, ...$parameters ) {
		$result_deprecated = $this->call_deprecated_filters( $name, $default_value, ...$parameters );

		$result = apply_filters( $name, $result_deprecated, ...$parameters );

		$sanitized_result = $sanitizer->sanitize( $result );

		if ( false === $sanitized_result && $sanitizer->is_default( $sanitized_result, $result ) ) {
			return $default_value;
		}

		return $sanitized_result;
	}

	/**
	 * Apply filters on a string value.
	 *
	 * @param string $name Name from the filter.
	 * @param string $default_value Default value from the filter.
	 * @param array  ...$parameters Parameters.
	 * @return string
	 */
	public function apply_string_filters( string $name, string $default_value, ...$parameters ): string {
		return $this->apply_filters( $name, new StringSanitizer(), $default_value, ...$parameters );
	}

	/**
	 * Apply filters on a boolean value.
	 *
	 * @param string $name Name from the filter.
	 * @param bool   $default_value Default value from the filter.
	 * @param array  ...$parameters Parameters.
	 * @return bool
	 */
	public function apply_bool_filters( string $name, bool $default_value, ...$parameters ): bool {
		return $this->apply_filters( $name, new BoolSanitizer(), $default_value, ...$parameters );
	}

	/**
	 * Apply filters on an integer value.
	 *
	 * @param string $name Name from the filter.
	 * @param int    $default_value Default value from the filter.
	 * @param array  ...$parameters Parameters.
	 * @return int
	 */
	public function apply_int_filters( string $name, int $default_value, ...$parameters ): int {
		return $this->apply_filters( $name, new IntSanitizer(), $default_value, ...$parameters );
	}

	/**
	 * Apply filters on a float value.
	 *
	 * @param string $name Name from the filter.
	 * @param float  $default_value Default value from the filter.
	 * @param array  ...$parameters Parameters.
	 * @return float
	 */
	public function apply_float_filters( string $name, float $default_value, ...$parameters ): float {
		return $this->apply_filters( $name, new FloatSanitizer(), $default_value, ...$parameters );
	}

	/**
	 * Add a deprecated action.
	 *
	 * @param string $name Name from the current action.
	 * @param string $deprecated_name Name from the deprecated action.
	 * @param string $version Version from the replacement.
	 * @param string $message Message to display to the user.
	 * @return void
	 */
	public function add_deprecated_action( string $name, string $deprecated_name, string $version, string $message = '' ) {
		$this->deprecated_actions[ $name ][] = [
			'name'    => $deprecated_name,
			'version' => $version,
			'message' => $message,
		];
	}

	/**
	 * Add a deprecated filter.
	 *
	 * @param string $name Name from the current filter.
	 * @param string $deprecated_name Name from the deprecated action.
	 * @param string $version Version from the replacement.
	 * @param string $message Message to display to the user.
	 * @return void
	 */
	public function add_deprecated_filter( string $name, string $deprecated_name, string $version, string $message = '' ) {
		$this->deprecated_filters[ $name ][] = [
			'name'    => $deprecated_name,
			'version' => $version,
			'message' => $message,
		];
	}

	/**
	 * Call deprecated actions from an action.
	 *
	 * @param string $name Name from the current action.
	 * @param array  ...$parameters Parameters from the current action.
	 *
	 * @return void
	 */
	protected function call_deprecated_actions( string $name, ...$parameters ) {
		if ( ! key_exists( $name, $this->deprecated_actions ) ) {
			return;
		}

		foreach ( $this->deprecated_actions[ $name ] as $action ) {
			do_action_deprecated( $action['name'], $parameters, $action['version'], $name, $action['message'] );
			$this->call_deprecated_actions( $action['name'], ...$parameters );
		}
	}

	/**
	 * Call deprecated filters from a filter.
	 *
	 * @param string $name Name from the current filter.
	 * @param mixed  $default_value Default value from the current filter.
	 * @param array  ...$parameters Parameters from the current filter.
	 *
	 * @return mixed
	 */
	protected function call_deprecated_filters( string $name, $default_value, ...$parameters ) {
		if ( ! key_exists( $name, $this->deprecated_filters ) ) {
			return $default_value;
		}

		foreach ( $this->deprecated_filters[ $name ] as $filter ) {
			$filter_parameters = array_merge( [ $default_value ], $parameters );
			$default_value     = apply_filters_deprecated( $filter['name'], $filter_parameters, $filter['version'], $name, $filter['message'] );
			$default_value     = $this->call_deprecated_filters( $filter['name'], $default_value, ...$parameters );
		}

		return $default_value;
	}
}
