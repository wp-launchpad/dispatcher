<?php

namespace LaunchpadDispatcher\Traits;

trait IsDefault {

	/**
	 * Is the value the default one.
	 *
	 * @param mixed $value Actual value.
	 * @param mixed $original Original value.
	 * @return bool
	 */
	public function is_default( $value, $original ): bool {
		return $value !== $original;
	}
}
