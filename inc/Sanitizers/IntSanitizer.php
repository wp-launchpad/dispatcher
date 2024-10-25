<?php

namespace LaunchpadDispatcher\Sanitizers;

use LaunchpadDispatcher\Interfaces\SanitizerInterface;
use LaunchpadDispatcher\Traits\IsDefault;

class IntSanitizer implements SanitizerInterface {
	use IsDefault;

	/**
	 * Sanitize the value.
	 *
	 * @param mixed $value Value to sanitize.
	 * @return mixed
	 */
	public function sanitize( $value ) {
		return (int) $value;
	}
}
