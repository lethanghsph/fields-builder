<?php
/**
 * Extend this class to declare fields.
 *
 * @package tl-framework
 */

/**
 * TL_Field Class
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class TL_Field {
	/**
	 * Aray attributes to register field.
	 *
	 * @var [array]
	 */
	protected $config;

	/**
	 * Key of group fields.
	 *
	 * @var [string|number]
	 */
	protected $unique;

	/**
	 * Value of field.
	 *
	 * @var [mixed]
	 */
	protected $value;

	/**
	 * Name of field.
	 *
	 * @var [string]
	 */
	protected $name;

	/**
	 * Type of field.
	 *
	 * @var [string]
	 */
	protected $type;

	/**
	 * Options of radio | select.
	 *
	 * @var [string]
	 */
	protected $options;

	/**
	 * Another attributes of field.
	 *
	 * @var [array]
	 */
	protected $attributes = array();

	/**
	 * Initialize.
	 *
	 * @param [array]                 $config [Attributes to register field].
	 * @param [string|number|boolean] $value  [value of field].
	 * @param [string|number]         $unique [ID of group fields].
	 */
	public function __construct( $config = array(), $value = '', $unique = '' ) {
		$this->config = $config;
		$this->value = $value;
		$this->unique = $unique;
		$this->attributes = ( $config['attributes'] ) ? $config['attributes'] : array();
		$this->options = ( $config['options'] ) ? $config['options'] : array();
	}

	/**
	 * Set value for field.
	 */
	public function set_value() {
		return $this->value;
	}

	/**
	 * Set name for field.
	 */
	public function set_name() {
		$field_id = ( isset( $this->config['id'] ) ) ? $this->config['id'] : '';
		$this->name = ( isset( $this->config['name'] ) ) ? $this->config['name'] : $this->unique . '[' . $field_id . ']';
		return $this->name;
	}

	/**
	 * Set type for field.
	 */
	public function set_type() {
		$this->type = ( $this->config['type'] ) ? $this->config['type'] : '';
		return $this->type;
	}

	/**
	 * Add attributes input.
	 *
	 * @param array $ex_atts [extra attributes].
	 */
	public function add_extra_attributes( $ex_atts ) {
		$ex_atts = ( is_array( $ex_atts ) ) ? $ex_atts : array();
		// TODO: array helper.
		$this->attributes = array_merge( $this->attributes, $ex_atts );
	}

	/**
	 * Set attributes for field.
	 */
	public function set_attributes() {
		// Set dependency.
		$sub_elemenet   = ( isset( $this->config['sub'] ) ) ? ' data-sub-depend-id': 'data-depend-id';
		if ( ! isset( $this->attributes[ $sub_elemenet ] ) || empty( $this->attributes[ $sub_elemenet ] ) ) {
			$this->attributes[ $sub_elemenet ] = $this->set_name();
		}

		$attribute_output = '';
		foreach ( $this->attributes as $key => $value ) {
			if ( 'only-key' === $value ) {
				$attribute_output .= ' ' . $key;
			} else {
				$attribute_output .= ' ' . $key . '="' . $value . '"';
			}
		}
		return $attribute_output;
	}

	/**
	 * Check option is selected.
	 *
	 * @param  mixed   $field_value   [Value of field].
	 * @param  string  $option_value  [Value of option in field].
	 * @param  string  $type          [String echo when option to be selected].
	 * @param  boolean $echo          [Echo or not].
	 */
	public function set_checked( $field_value = '', $option_value = '', $type = 'checked', $echo = false ) {
		if ( is_array( $field_value ) && in_array( $option_value, $field_value ) ) {
			$result = ' ' . $type;
		} else if ( $field_value == $option_value ) {
			$result = ' ' . $type;
		} else {
			$result = '';
		}
		if ( $echo ) {
			print $result; // WPCS: XSS OK.
		}
		return $result;
	}

}

