<?php
/**
 * This class to build element password field
 *
 * @package tl-framework
 */

/**
 * Strategy Pattern.
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class TL_Field_Password extends TL_Field_Set_Output_Abstract {
	/**
	 * Instance of object to build field.
	 *
	 * @var [object]
	 */
	protected $field;

	/**
	 * Initialize function.
	 *
	 * @param TL_Field $tl_field [Class to set field attributes].
	 */
	public function __construct( TL_Field $tl_field ) {
		$this->field = $tl_field;
	}

	/**
	 * Set output of field.
	 */
	public function set_output() {
		$field = $this->field;
		$output = '';
		$output .= $field->generate_before();
		$output .= $this->field->generate_input();
		$output .= $field->generate_after();
		return $output;
	}
}
