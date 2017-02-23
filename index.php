<?php
// Silence is golden.
include 'base/tl_field.php';
include 'behaviors/tl_field_set_output_abstract.php';
foreach ( glob( 'fields/*.php' ) as $_field ) {
	include $_field;
}

$agrs = array(
	'id' => 'id_test',
	'type' => 'radio',
	'title' => 'title',
	'attributes' => array(
		'id' => 'thangle',
		'class' => 'thangle',
	),
	'options' => array(
		'value1' => 'Value 1',
		'value2' => 'Value 2',
		'value3' => 'Value 3',
		'value4' => 'Value 4',
	),
);
$field = new TL_Field( $agrs, 'thangle', $agrs['id'] );
$field_text = new TL_Field_Radio( $field );
echo $field_text->set_output();



