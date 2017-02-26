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
		$this->attributes = ( isset( $config['atts'] ) && ! empty( $config['atts'] ) ) ? $config['atts'] : array();
		$this->options = ( isset( $config['options'] ) && ! empty( $config['options'] ) ) ? $config['options'] : '';
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
	 * Set option for radio | select field.
	 */
	public function set_options() {
		return $this->options;
	}

	/**
	 * Check option is selected.
	 *
	 * @param  string  $option_value  [Value of option in field].
	 * @param  mixed   $field_value   [Value of field].
	 * @param  string  $type          [String echo when option to be selected].
	 * @param  boolean $echo          [Echo or not].
	 */
	public function set_checked( $option_value = '', $field_value = '', $type = 'checked', $echo = false ) {
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

	/**
	 * Set attributes for field.
	 *
	 * @param array $ex_atts [extra attributes].
	 */
	public function generate_attributes( $ex_atts = array() ) {

		// Add extra attributes.
		$ex_atts = ( is_array( $ex_atts ) ) ? $ex_atts : array();
		// Set extra class.
		if ( isset( $ex_atts['class'] ) && isset( $this->attributes['class'] ) ) {
			$this->attributes['class'] .= ' ' . $ex_atts['class'];
		}
		// TODO: array helper.
		$this->attributes = array_merge( $ex_atts, $this->attributes );

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
	 * Generate before field.
	 */
	public function generate_before() {
		return ( isset( $this->config['before_field'] ) ) ? $this->config['before_field'] : '';
	}

	/**
	 * Generate after field.
	 */
	public function generate_after() {
		return ( isset( $this->config['after_field'] ) ) ? $this->config['after_field'] : '';
	}

	/**
	 * Generate input field type.
	 *
	 * @param array $agrs [custom attributes].
	 */
	public function generate_input( $agrs = array() ) {
		$default = array(
			'name'         => $this->set_name(),
			'value'        => $this->set_value(),
			'type'         => $this->set_type(),
			'atts'         => $this->generate_attributes(),
			'checked'      => ''
		);
		// TODO: Array helps.
		$config = array_merge( $default, $agrs );
		$output = sprintf(
			'<input type="%1$s" name="%2$s" value="%3$s"%4$s %5$s>',
			$config['type'],
			$config['name'],
			$config['value'],
			$config['checked'],
			$config['atts']
		);
		return $output;
	}

	/**
	 * Generate option for select field type.
	 *
	 * @param array $agrs [custom attributes].
	 */
	public function generate_select( $agrs = array() ) {

		if ( empty( $this->options ) ) { return; };

		$default = array(
			'name'         => $this->set_name(),
			'value'        => $this->set_value(),
			'type'         => $this->set_type(),
			'atts'         => $this->generate_attributes(),
		);
		// TODO: Array helps.
		$config = array_merge( $default, $agrs );
		$option = '';
		foreach ( $this->options as $key => $value ) {
			$option .= sprintf(
				'<option value="%1$s" %2$s>%3$s</option>',
				$key,
				$this->set_checked( $key, $config['value'], 'selected' ),
				$value
			);
		}
		$output = '';
		$output .= sprintf(
			'<select name="%1$s"%2$s>%3$s</select>',
			$config['name'],
			$config['atts'],
			$option
		);
		return $output;

	}

}

