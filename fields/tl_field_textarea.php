<?php
/**
 * This class to build element textarea field
 *
 * @package tl-framework
 */

/**
 * Strategy Pattern.
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class TL_Field_Textarea extends TL_Field_Set_Output_Abstract {
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
		$this->field->add_extra_attributes( array(
			'rows' => '8',
			'cols' => '50',
		) );
	}

	/**
	 * Set output of field.
	 */
	public function set_output() {
		$field = $this->field;
		return '<textarea name="' . $field->set_name() . '" ' . $field->set_attributes() . '>' . $field->set_value() . '</textarea>';
	}
}
