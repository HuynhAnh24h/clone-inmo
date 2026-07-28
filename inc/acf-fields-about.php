<?php
if( function_exists('acf_add_local_field_group') ):

    // Field Group cho TRANG VỀ CHÚNG TÔI (About Page)
    $about_fields = array(
        array('key' => 'field_about_hero_title', 'label' => 'Tiêu đề trang', 'name' => 'about_hero_title', 'type' => 'text', 'default_value' => 'ABOUT INMO'),
        array('key' => 'field_about_hero_subtitle', 'label' => 'Mô tả ngắn', 'name' => 'about_hero_subtitle', 'type' => 'textarea', 'default_value' => 'Never Just Glasses'),
        array('key' => 'field_about_intro_heading', 'label' => 'Tiêu đề phần Giới thiệu', 'name' => 'about_intro_heading', 'type' => 'text', 'default_value' => 'Brand Introduction'),
        array('key' => 'field_about_intro_text', 'label' => 'Nội dung Giới thiệu', 'name' => 'about_intro_text', 'type' => 'textarea', 'default_value' => 'INMO focuses on the research and development...'),
        array('key' => 'field_about_vision_heading', 'label' => 'Tiêu đề Tầm nhìn (Vision)', 'name' => 'about_vision_heading', 'type' => 'text', 'default_value' => 'INMO VISION'),
        array('key' => 'field_about_vision_text', 'label' => 'Nội dung Tầm nhìn', 'name' => 'about_vision_text', 'type' => 'textarea', 'default_value' => 'In the near future...'),
    );

    // Tạo các trường lặp cố định bằng PHP Loop (vì ACF Free không có Repeater)
    
    // History (7 items)
    $about_fields[] = array('key' => 'tab_history', 'label' => 'Lịch sử phát triển', 'type' => 'tab');
    for($i = 1; $i <= 7; $i++) {
        $about_fields[] = array('key' => 'field_history_'.$i.'_date', 'label' => 'Ngày tháng '.$i, 'name' => 'history_'.$i.'_date', 'type' => 'text');
        $about_fields[] = array('key' => 'field_history_'.$i.'_text', 'label' => 'Nội dung '.$i, 'name' => 'history_'.$i.'_text', 'type' => 'textarea');
    }

    // Patents (4 items)
    $about_fields[] = array('key' => 'tab_patents', 'label' => 'Bằng sáng chế', 'type' => 'tab');
    for($i = 1; $i <= 4; $i++) {
        $about_fields[] = array('key' => 'field_patent_'.$i.'_num', 'label' => 'Số lượng '.$i, 'name' => 'patent_'.$i.'_num', 'type' => 'text');
        $about_fields[] = array('key' => 'field_patent_'.$i.'_label', 'label' => 'Tên bằng sáng chế '.$i, 'name' => 'patent_'.$i.'_label', 'type' => 'text');
        $about_fields[] = array('key' => 'field_patent_'.$i.'_img', 'label' => 'Ảnh '.$i, 'name' => 'patent_'.$i.'_img', 'type' => 'image', 'return_format' => 'url');
    }

    // Awards (4 items)
    $about_fields[] = array('key' => 'tab_awards', 'label' => 'Giải thưởng', 'type' => 'tab');
    for($i = 1; $i <= 4; $i++) {
        $about_fields[] = array('key' => 'field_award_'.$i.'_text', 'label' => 'Mô tả giải thưởng '.$i, 'name' => 'award_'.$i.'_text', 'type' => 'text');
        $about_fields[] = array('key' => 'field_award_'.$i.'_img', 'label' => 'Ảnh giải thưởng '.$i, 'name' => 'award_'.$i.'_img', 'type' => 'image', 'return_format' => 'url');
    }

    // Products (6 items)
    $about_fields[] = array('key' => 'tab_products', 'label' => 'Sản phẩm', 'type' => 'tab');
    for($i = 1; $i <= 6; $i++) {
        $about_fields[] = array('key' => 'field_product_'.$i.'_name', 'label' => 'Tên sản phẩm '.$i, 'name' => 'product_'.$i.'_name', 'type' => 'text');
        $about_fields[] = array('key' => 'field_product_'.$i.'_desc', 'label' => 'Mô tả '.$i, 'name' => 'product_'.$i.'_desc', 'type' => 'text');
        $about_fields[] = array('key' => 'field_product_'.$i.'_date', 'label' => 'Ngày ra mắt '.$i, 'name' => 'product_'.$i.'_date', 'type' => 'text');
        $about_fields[] = array('key' => 'field_product_'.$i.'_img', 'label' => 'Ảnh sản phẩm '.$i, 'name' => 'product_'.$i.'_img', 'type' => 'image', 'return_format' => 'url');
    }

    acf_add_local_field_group(array(
        'key' => 'group_about_page',
        'title' => 'Tùy chỉnh Trang Về Chúng Tôi',
        'fields' => $about_fields,
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'page-about.php'),
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
