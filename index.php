<?php
// Silence is golden.
?>
<link rel="stylesheet" href="assets/bootstrap.min.css" />
<?php
include 'behaviors/tl_field_set_output_abstract.php';
include 'base/tl_field.php';
include 'base/tl_generate_field.php';
foreach ( glob( 'fields/*.php' ) as $_field ) {
	include $_field;
}

$args  = array(

		// begin: a field
		array(
			'id'      => 'text_1',
			'type'    => 'text',
			'title'   => 'Text',
		),
		// end: a field

		array(
			'id'      => 'textarea_1',
			'type'    => 'textarea',
			'title'   => 'Textarea',
			'help'    => 'This option field is useful. You will love it!',
		),

		array(
			'id'      => 'switcher_1',
			'type'    => 'password',
			'title'   => 'Switcher',
			'label'   => 'You want to update for this framework ?',
		),

		array(
			'id'      => 'radio_1',
			'type'    => 'radio',
			'title'   => 'Radio',
			'options' => array(
				'yes'   => 'Yes, Please.',
				'no'    => 'No, Thank you.',
			),
			'help'    => 'Are you sure for this choice?',
		),

		array(
			'id'             => 'select_2',
			'type'           => 'checkbox',
			'title'          => 'Select',
			'options'        => array(
				'bmw'          => 'BMW',
				'mercedes'     => 'Mercedes',
				'volkswagen'   => 'Volkswagen',
				'other'        => 'Other',
			),
			'default_option' => 'Select your favorite car',
		),
		array(
			'id'      => 'switcher_1',
			'type'    => 'submit',
			'title'   => 'Switcher',
			'label'   => 'You want to update for this framework ?',
			'atts' => array(
				'class' => 'thangle',
			),
			'value' => 'Submit',
		),
	 array(
			'id'      => 'switcher_1',
			'type'    => 'reset',
			'title'   => 'Switcher',
			'label'   => 'You want to update for this framework ?',
			'atts' => array(
				'class' => 'thangle',
			),
			'value' => 'Reset',
		),
	 array(
			'id'      => 'switcher_1',
			'type'    => 'button',
			'title'   => 'Switcher',
			'label'   => 'You want to update for this framework ?',
			'atts' => array(
				'class' => 'thangle',
			),
			'value' => 'Button',
			'before_field' => 'before',
			'after_field' => 'after',
		),
		array(
			'id'             => 'select_1',
			'type'           => 'select',
			'title'          => 'Select',
			'options'        => array(
				'bmw'          => 'BMW',
				'mercedes'     => 'Mercedes',
				'volkswagen'   => 'Volkswagen',
				'other'        => 'Other',
			),
			'default_option' => 'Select your favorite car',
			'atts' => array(
				'multiple' => 'only-key',
			),
			'value' => array(
				'bmw',
				'other',
			),
		),

 );
foreach ( $args as $key => $agr ) {
	$value = (isset( $agr['value'] ) && ! empty( $agr['value'] )) ? $agr['value']:'mercedes';
	$field = new TL_Field( $agr, $value, $agr['id'] );
	$field_text = new TL_Generate_Field( $field );
	echo $field_text->set_output();
	echo '<br />';
}
