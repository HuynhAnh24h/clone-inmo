<?php
if( function_exists('acf_add_local_field_group') ):

$fields = array(
    array(
        'key' => 'field_custom_note_1',
        'label' => 'Ghi chú tùy chỉnh 1',
        'name' => 'custom_note_1',
        'type' => 'text',
    ),
    array(
        'key' => 'field_custom_note_2',
        'label' => 'Ghi chú tùy chỉnh 2',
        'name' => 'custom_note_2',
        'type' => 'text',
    ),
);

// Thêm 5 tính năng (Accordion)
for ($i = 1; $i <= 5; $i++) {
    $fields[] = array(
        'key' => 'field_feature_' . $i . '_title',
        'label' => 'Tính năng ' . $i . ' (Tiêu đề)',
        'name' => 'feature_' . $i . '_title',
        'type' => 'text',
    );
    $fields[] = array(
        'key' => 'field_feature_' . $i . '_body',
        'label' => 'Tính năng ' . $i . ' (Nội dung)',
        'name' => 'feature_' . $i . '_body',
        'type' => 'textarea',
    );
}

// Thêm 3 Tabs
for ($j = 1; $j <= 3; $j++) {
    $fields[] = array(
        'key' => 'field_tab_' . $j . '_title',
        'label' => 'Tab ' . $j . ' (Tiêu đề)',
        'name' => 'tab_' . $j . '_title',
        'type' => 'text',
    );
    $fields[] = array(
        'key' => 'field_tab_' . $j . '_content',
        'label' => 'Tab ' . $j . ' (Nội dung - Hình/Video)',
        'name' => 'tab_' . $j . '_content',
        'type' => 'wysiwyg',
    );
}

// Giữ lại các trường cũ
$fields[] = array(
    'key' => 'field_product_banner_image',
    'label' => 'Ảnh Banner Full Width',
    'name' => 'product_banner_image',
    'type' => 'image',
    'return_format' => 'url',
);
$fields[] = array(
    'key' => 'field_ergonomic_heading',
    'label' => 'Tiêu đề Phần Thiết Kế',
    'name' => 'ergonomic_heading',
    'type' => 'text',
    'default_value' => 'Ergonomic Design for All-Day Comfort',
);
$fields[] = array(
    'key' => 'field_ergonomic_subheading',
    'label' => 'Mô tả phụ Phần Thiết Kế',
    'name' => 'ergonomic_subheading',
    'type' => 'text',
    'default_value' => 'Precision crafted for lightweight performance',
);

acf_add_local_field_group(array(
    'key' => 'group_product_additional_data',
    'title' => 'Dữ liệu Bổ sung Sản phẩm',
    'fields' => $fields,
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
