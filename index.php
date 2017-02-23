<?php
// Silence is golden.
include 'base/tl_field.php';
include 'behaviors/tl_field_set_output_abstract.php';
foreach ( glob( 'fields/*.php' ) as $_field ) {
	include $_field;
}

$agrs = array(
	'id' => 'id_test',
	'type' => 'textarea',
	'title' => 'title',
	'attributes' => array(
		'id' => 'thangle',
		'class' => 'thangle',
	),
);
$field = new TL_Field( $agrs, 'thangle', $agrs['id'] );
$field_text = new TL_Field_Textarea( $field );
echo $field_text->set_output();



