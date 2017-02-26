<?php
/**
 * This class to build element reset field
 *
 * @package tl-framework
 */

/**
 * Strategy Pattern.
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class TL_Field_Reset extends TL_Field_Set_Output_Abstract {
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
		$ex_atts = array(
			'class' => 'btn btn-danger',
		);

		$output = '';
		$output .= $field->generate_before();
		$output .= $this->field->generate_input( array(
			'atts' => $field->generate_attributes( $ex_atts ),
		) );
		$output .= $field->generate_after();
		return $output;
	}
}
