<?php

namespace LaunchpadDispatcher\Sanitizers;

use LaunchpadDispatcher\Interfaces\SanitizerInterface;

class SafeSanitizer implements SanitizerInterface {

	/**
	 * Original value from the filter.
	 *
	 * @var string
	 */
	protected $original_type;

	/**
	 * Is the value invalid.
	 *
	 * @var bool
	 */
	protected $invalid = false;

	/**
	 * Instantiate sanitizer.
	 *
	 * @param string $original_type Original value from the filter.
	 */
	public function __construct( string $original_type ) {
		$this->original_type = $original_type;
	}


	/**
	 * Sanitize the value.
	 *
	 * @param mixed $value Value to sanitize.
	 * @return mixed
	 */
	public function sanitize( $value ) {
		if ( gettype( $value ) !== $this->original_type ) {
			$this->invalid = true;
			return false;
		}

		return $value;
	}

	/**
	 * Is the value the default one.
	 *
	 * @param mixed $value Actual value.
	 * @param mixed $original Original value.
	 * @return bool
	 */
	public function is_default( $value, $original ): bool {
		return $this->invalid;
	}
}
