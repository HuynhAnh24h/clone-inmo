<?php
if( function_exists('acf_add_local_field_group') ):

    // Field Group cho TRANG CHỦ (Front Page)
    acf_add_local_field_group(array(
        'key' => 'group_front_page',
        'title' => 'Tùy chỉnh Trang Chủ',
        'fields' => array(
            array('key' => 'field_hero_title', 'label' => 'Tiêu đề Banner chính', 'name' => 'hero_title', 'type' => 'text', 'default_value' => 'INMO GO3'),
            array('key' => 'field_hero_bg', 'label' => 'Hình nền Banner chính', 'name' => 'hero_bg_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_discount_title', 'label' => 'Tiêu đề phần Giảm giá', 'name' => 'discount_title', 'type' => 'text', 'default_value' => '10% OFF'),
            array('key' => 'field_discount_code_send', 'label' => 'Mã Coupon tự động gửi cho khách', 'name' => 'discount_code_send', 'type' => 'text', 'default_value' => 'WELCOME10', 'instructions' => 'Mã ưu đãi từ WooCommerce sẽ được tự động gửi qua email cho khách khi họ điền form đăng ký.'),
            array('key' => 'field_about_title', 'label' => 'Tiêu đề phần Về Chúng Tôi', 'name' => 'about_title', 'type' => 'text', 'default_value' => 'Hơn cả một chiếc kính'),
            array('key' => 'field_about_bg', 'label' => 'Hình nền phần Về Chúng Tôi', 'name' => 'about_bg_image', 'type' => 'image', 'return_format' => 'url'),
        ),
        'location' => array(
            array(
                array('param' => 'page_type', 'operator' => '==', 'value' => 'front_page'),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Các trường dữ liệu tùy chỉnh cho Trang chủ',
    ));

endif;
