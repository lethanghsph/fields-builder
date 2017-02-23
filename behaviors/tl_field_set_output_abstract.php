<?php
/**
 * Extend this class to build fields.
 *
 * @package tl-framework
 */

/**
 * Extends this class to set output.
 * Strategy Pattern.
 *
 * @since 1.0.0
 * @version 1.0.0
 */
abstract class TL_Field_Set_Output_Abstract {
	/**
	 * Set output for field.
	 */
	abstract public function set_output();
}
