<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_product_additional_data',
	'title' => 'Product Additional Data',
	'fields' => array(
		array(
			'key' => 'field_custom_note_1',
			'label' => 'Custom Note 1',
			'name' => 'custom_note_1',
			'type' => 'text',
		),
		array(
			'key' => 'field_custom_note_2',
			'label' => 'Custom Note 2',
			'name' => 'custom_note_2',
			'type' => 'text',
		),
		array(
			'key' => 'field_product_features',
			'label' => 'Accordion Features',
			'name' => 'product_features',
			'type' => 'repeater',
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_acc_title',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
				),
				array(
					'key' => 'field_acc_body',
					'label' => 'Body Content',
					'name' => 'body',
					'type' => 'textarea',
				),
			),
		),
		array(
			'key' => 'field_product_banner_image',
			'label' => 'Full Width Banner Image',
			'name' => 'product_banner_image',
			'type' => 'image',
			'return_format' => 'url',
		),
		array(
			'key' => 'field_ergonomic_heading',
			'label' => 'Ergonomic Section Heading',
			'name' => 'ergonomic_heading',
			'type' => 'text',
			'default_value' => 'Ergonomic Design for All-Day Comfort',
		),
		array(
			'key' => 'field_ergonomic_subheading',
			'label' => 'Ergonomic Section Subheading',
			'name' => 'ergonomic_subheading',
			'type' => 'text',
			'default_value' => 'Precision crafted for lightweight performance',
		),
		array(
			'key' => 'field_feature_sm_data',
			'label' => 'Small Features (Row 1)',
			'name' => 'feature_sm_data',
			'type' => 'repeater',
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_fsm_title',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
				),
				array(
					'key' => 'field_fsm_image',
					'label' => 'Icon/Image',
					'name' => 'image',
					'type' => 'image',
					'return_format' => 'url',
				),
			),
		),
		array(
			'key' => 'field_feature_lg_data_1',
			'label' => 'Large Features (Row 2)',
			'name' => 'feature_lg_data_1',
			'type' => 'repeater',
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_flg1_title',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
				),
				array(
					'key' => 'field_flg1_image',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'return_format' => 'url',
				),
			),
		),
		array(
			'key' => 'field_feature_lg_data_2',
			'label' => 'Large Features (Row 3)',
			'name' => 'feature_lg_data_2',
			'type' => 'repeater',
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_flg2_title',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
				),
				array(
					'key' => 'field_flg2_image',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'return_format' => 'url',
				),
			),
		),
		array(
			'key' => 'field_compatible_models',
			'label' => 'Compatible Models (App Section)',
			'name' => 'compatible_models',
			'type' => 'repeater',
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_model_name',
					'label' => 'Model Name',
					'name' => 'model_name',
					'type' => 'text',
				),
			),
		),
		array(
			'key' => 'field_testimonials',
			'label' => 'Testimonials',
			'name' => 'testimonials',
			'type' => 'repeater',
			'layout' => 'row',
			'sub_fields' => array(
				array(
					'key' => 'field_testi_quote',
					'label' => 'Quote',
					'name' => 'quote',
					'type' => 'textarea',
				),
				array(
					'key' => 'field_testi_author',
					'label' => 'Author',
					'name' => 'author',
					'type' => 'text',
				),
				array(
					'key' => 'field_testi_image',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'return_format' => 'url',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
