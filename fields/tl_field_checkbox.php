<?php
/**
 * This class to build element checkbox field
 *
 * @package tl-framework
 */

/**
 * Strategy Pattern.
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class TL_Field_Checkbox extends TL_Field_Set_Output_Abstract {
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
		$options = $field->set_options();
		if ( empty( $options ) ) { return; };

		$output = '<ul>';
		foreach ( $options as $key => $value ) {
			$output .= '<li>';
			$output .= $field->generate_input( array(
				'after' => $value,
				'value' => $key,
			) );
			$output .= '</li>';
		}
		$output .= '</ul>';

		return $output;
	}
}