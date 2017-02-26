<?php
/**
 * Get output of field.
 *
 * @package tl-framework
 */

/**
 * Strategy Pattern.
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class TL_Generate_Field {
	/**
	 * Field type instance.
	 *
	 * @var [object]
	 */
	protected $field;

	/**
	 * Set type.
	 *
	 * @param TL_Field $field_instance [object to build field].
	 */
	public function __construct( TL_Field $field_instance ) {
		$field = 'TL_Field_' . $field_instance->set_type();
		$this->field = new $field( $field_instance );
	}

	/**
	 * [set_output description]
	 */
	public function set_output() {
		return $this->field->set_output();
	}
}
