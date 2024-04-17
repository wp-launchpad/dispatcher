<?php

namespace LaunchpadDispatcher\Interfaces;

interface SanitizerInterface {

	/**
	 * Sanitize the value.
	 *
	 * @param mixed $value Value to sanitize.
	 * @return mixed
	 */
	public function sanitize( $value );

	/**
	 * Is the value the default one.
	 *
	 * @param mixed $value Actual value.
	 * @param mixed $original Original value.
	 * @return bool
	 */
	public function is_default( $value, $original ): bool;
}
