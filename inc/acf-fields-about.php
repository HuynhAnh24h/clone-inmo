<?php
if( function_exists('acf_add_local_field_group') ):

    $about_fields = array();

    // ================= HERO & INTRO =================
    $about_fields[] = array('key' => 'tab_hero', 'label' => 'Hero & Giới thiệu', 'type' => 'tab');
    $about_fields[] = array('key' => 'field_about_hero_title', 'label' => 'Tiêu đề trang', 'name' => 'about_hero_title', 'type' => 'text', 'default_value' => 'ABOUT INMO');
    $about_fields[] = array('key' => 'field_about_hero_subtitle', 'label' => 'Mô tả ngắn', 'name' => 'about_hero_subtitle', 'type' => 'textarea', 'default_value' => 'Never Just Glasses');
    $about_fields[] = array('key' => 'field_about_intro_heading', 'label' => 'Tiêu đề phần Giới thiệu', 'name' => 'about_intro_heading', 'type' => 'text', 'default_value' => 'BRAND INTRODUCTION');
    $about_fields[] = array('key' => 'field_about_intro_text', 'label' => 'Nội dung Giới thiệu (Dùng <b> text </b> để bôi sáng chữ)', 'name' => 'about_intro_text', 'type' => 'textarea', 'default_value' => 'INMO focuses on the research and development of smart glasses, and is the first brand to introduce <b>AR</b> technology into <b>wireless smart glasses</b>. As an industry pioneer, INMO is committed to creating a new lifestyle for the <b>Metaverse</b>, breaking the boundaries of time and space, and empowering everyone with the ability to perceive the world and explore the future.');

    // ================= TECH DIAGRAM =================
    $about_fields[] = array('key' => 'tab_diagram', 'label' => 'Sơ đồ Công nghệ', 'type' => 'tab');
    $about_fields[] = array('key' => 'field_diagram_image', 'label' => 'Ảnh Sơ đồ', 'name' => 'diagram_image', 'type' => 'image', 'return_format' => 'url');
    $about_fields[] = array('key' => 'field_diagram_caption', 'label' => 'Chú thích sơ đồ', 'name' => 'diagram_caption', 'type' => 'text', 'default_value' => 'PIONEER AND LEADER OF WIRELESS AR GLASSES');

    // ================= HISTORY =================
    $about_fields[] = array('key' => 'tab_history', 'label' => 'Lịch sử phát triển', 'type' => 'tab');
    $about_fields[] = array('key' => 'field_history_heading', 'label' => 'Tiêu đề Lịch sử', 'name' => 'history_heading', 'type' => 'text', 'default_value' => 'DEVELOPMENT HISTORY');
    
    $history_defaults = [
        [ 'date' => '2021.01', 'text' => 'From Coolpad Group, Yingmu Technology Co., Ltd. was established.' ],
        [ 'date' => '2021.05', 'text' => 'The first 5G all-in-one AR glasses, <b>INMO X series</b>, debut at China Telecom\'s Cloud Network Integration 2.0 launch event' ],
        [ 'date' => '2022.04', 'text' => '<b>INMO AR</b> officially delivered, the earliest mass-produced and delivered wireless all-in-one AR smart glasses' ],
        [ 'date' => '2022.10', 'text' => '<b>INMO AIR2</b> officially launched, the first domestically produced dual-eye full-color all-in-one AR glasses officially launched' ],
        [ 'date' => '2023.04', 'text' => '<b>INMO AIR2</b> officially mass-produced and became the No.1 in sales of the JD XR <b>INMO AIR2</b>' ],
        [ 'date' => '2023.09', 'text' => '<b>INMO GO</b> officially launched, the world\'s first mass-produced wireless AR glasses with access to AIGC' ],
        [ 'date' => '2024.11', 'text' => '<b>INMO AIR3, INMO GO2, INMO X</b> series AI photo glasses released the first batch of blind orders exceeding 10,000 units' ]
    ];
    for($i = 1; $i <= 7; $i++) {
        $about_fields[] = array('key' => 'field_history_'.$i.'_date', 'label' => 'Ngày tháng '.$i, 'name' => 'history_'.$i.'_date', 'type' => 'text', 'default_value' => $history_defaults[$i-1]['date']);
        $about_fields[] = array('key' => 'field_history_'.$i.'_text', 'label' => 'Nội dung '.$i, 'name' => 'history_'.$i.'_text', 'type' => 'textarea', 'default_value' => $history_defaults[$i-1]['text']);
    }

    // ================= PATENTS =================
    $about_fields[] = array('key' => 'tab_patents', 'label' => 'Bằng sáng chế', 'type' => 'tab');
    $about_fields[] = array('key' => 'field_patents_heading', 'label' => 'Tiêu đề', 'name' => 'patents_heading', 'type' => 'text', 'default_value' => 'PATENTS');
    
    $patent_defaults = [
        [ 'num' => '100+', 'label' => 'AR FIELD TECHNOLOGY PATENTS' ],
        [ 'num' => '30+', 'label' => 'PATENTS RELATED TO 5G TECHNOLOGY' ],
        [ 'num' => '20+', 'label' => 'MODEL AND DESIGN PATENTS FOR WEARABLE DEVICES' ],
        [ 'num' => '25+', 'label' => 'TECHNOLOGY PATENTS IN THE FIELD OF AI' ]
    ];
    for($i = 1; $i <= 4; $i++) {
        $about_fields[] = array('key' => 'field_patent_'.$i.'_num', 'label' => 'Số lượng '.$i, 'name' => 'patent_'.$i.'_num', 'type' => 'text', 'default_value' => $patent_defaults[$i-1]['num']);
        $about_fields[] = array('key' => 'field_patent_'.$i.'_label', 'label' => 'Tên bằng sáng chế '.$i, 'name' => 'patent_'.$i.'_label', 'type' => 'text', 'default_value' => $patent_defaults[$i-1]['label']);
        $about_fields[] = array('key' => 'field_patent_'.$i.'_img', 'label' => 'Ảnh nền '.$i, 'name' => 'patent_'.$i.'_img', 'type' => 'image', 'return_format' => 'url');
    }

    // ================= AWARDS =================
    $about_fields[] = array('key' => 'tab_awards', 'label' => 'Giải thưởng', 'type' => 'tab');
    $about_fields[] = array('key' => 'field_awards_heading', 'label' => 'Tiêu đề', 'name' => 'awards_heading', 'type' => 'text', 'default_value' => 'INDUSTRY AWARDS');
    
    $award_defaults = [
        "2023 International CMF Design Award. The first smart AR glasses to win a grand prize.",
        "MUSE Design Awards in the United States Supreme <b>Award/Platinum Award</b>",
        "FBEC2023 - Golden Gyroscope Award Annual Outstanding Consumer Hardware Award",
        "2024 SIVA Awards Best AR <b>hardware Award</b>"
    ];
    for($i = 1; $i <= 4; $i++) {
        $about_fields[] = array('key' => 'field_award_'.$i.'_text', 'label' => 'Mô tả giải thưởng '.$i, 'name' => 'award_'.$i.'_text', 'type' => 'textarea', 'default_value' => $award_defaults[$i-1]);
        $about_fields[] = array('key' => 'field_award_'.$i.'_img', 'label' => 'Ảnh logo giải thưởng '.$i, 'name' => 'award_'.$i.'_img', 'type' => 'image', 'return_format' => 'url');
    }

    // ================= FINANCING =================
    $about_fields[] = array('key' => 'tab_financing', 'label' => 'Lịch sử tài trợ', 'type' => 'tab');
    $about_fields[] = array('key' => 'field_financing_heading', 'label' => 'Tiêu đề', 'name' => 'financing_heading', 'type' => 'text', 'default_value' => 'FINANCING HISTORY');
    
    $financing_defaults = [
        [ 'round' => '2021 Angel Round', 'desc' => '$9M Valuation 37 Interactive Entertainment, Eagle Investment' ],
        [ 'round' => '2021 Pre-A Round', 'desc' => '$40M Valuation Matrix Partners' ],
        [ 'round' => '2022 A Round', 'desc' => '$110M Valuation Chiwei Group' ],
        [ 'round' => '2024 B Round', 'desc' => 'Over $150M Valuation Chuan Development Group, Chenghua Science and Technology Investment' ],
        [ 'round' => '2025 B+ Round', 'desc' => 'Over 7 Valuation' ]
    ];
    for($i = 1; $i <= 5; $i++) {
        $about_fields[] = array('key' => 'field_financing_'.$i.'_round', 'label' => 'Vòng gọi vốn '.$i, 'name' => 'financing_'.$i.'_round', 'type' => 'text', 'default_value' => $financing_defaults[$i-1]['round']);
        $about_fields[] = array('key' => 'field_financing_'.$i.'_desc', 'label' => 'Chi tiết tài trợ '.$i, 'name' => 'financing_'.$i.'_desc', 'type' => 'textarea', 'default_value' => $financing_defaults[$i-1]['desc']);
    }

    // ================= PRODUCTS =================
    $about_fields[] = array('key' => 'tab_products', 'label' => 'Sản phẩm', 'type' => 'tab');
    $about_fields[] = array('key' => 'field_products_heading', 'label' => 'Tiêu đề', 'name' => 'products_heading', 'type' => 'text', 'default_value' => 'OUR PRODUCTS');
    
    $product_defaults = [
        [ 'name' => 'INMO AIR', 'desc' => "The world's first mass-produced consumer grade wireless smart glasses", 'date' => '2022 Apr.' ],
        [ 'name' => 'INMO AIR2', 'desc' => "The world's first lightweight AR glasses to achieve SLAM + 6DoF spatial interaction", 'date' => '2022 Oct.' ],
        [ 'name' => 'INMO GO', 'desc' => "The world's first mass-produced wireless AR glasses integrated with AIGC", 'date' => '2023 Sep.' ],
        [ 'name' => 'INMO AIR3', 'desc' => "The world's first 1080P all-in-one AR glasses", 'date' => '2024 Nov.' ],
        [ 'name' => 'INMO GO2', 'desc' => "The world's first translation glasses equipped with an independent Android system", 'date' => '2024 Nov.' ],
        [ 'name' => 'INMO X', 'desc' => 'AI+Camera Glasses', 'date' => '2024 Nov.' ]
    ];
    for($i = 1; $i <= 6; $i++) {
        $about_fields[] = array('key' => 'field_product_'.$i.'_name', 'label' => 'Tên sản phẩm '.$i, 'name' => 'product_'.$i.'_name', 'type' => 'text', 'default_value' => $product_defaults[$i-1]['name']);
        $about_fields[] = array('key' => 'field_product_'.$i.'_desc', 'label' => 'Mô tả '.$i, 'name' => 'product_'.$i.'_desc', 'type' => 'text', 'default_value' => $product_defaults[$i-1]['desc']);
        $about_fields[] = array('key' => 'field_product_'.$i.'_date', 'label' => 'Ngày ra mắt '.$i, 'name' => 'product_'.$i.'_date', 'type' => 'text', 'default_value' => $product_defaults[$i-1]['date']);
        $about_fields[] = array('key' => 'field_product_'.$i.'_img', 'label' => 'Ảnh sản phẩm '.$i, 'name' => 'product_'.$i.'_img', 'type' => 'image', 'return_format' => 'url');
    }

    // ================= GLOBAL MAP =================
    $about_fields[] = array('key' => 'tab_map', 'label' => 'Bản đồ toàn cầu', 'type' => 'tab');
    $about_fields[] = array('key' => 'field_map_heading', 'label' => 'Tiêu đề Bản đồ', 'name' => 'map_heading', 'type' => 'text', 'default_value' => 'Already settled in over 50 cities around the world');
    $about_fields[] = array('key' => 'field_map_subheading', 'label' => 'Tiêu đề phụ', 'name' => 'map_subheading', 'type' => 'text', 'default_value' => 'Over 200 physical locations globally');

    // ================= VISION =================
    $about_fields[] = array('key' => 'tab_vision', 'label' => 'Tầm nhìn', 'type' => 'tab');
    $about_fields[] = array('key' => 'field_about_vision_heading', 'label' => 'Chữ nền lớn', 'name' => 'about_vision_heading', 'type' => 'text', 'default_value' => 'BRAND');
    $about_fields[] = array('key' => 'field_about_vision_highlight', 'label' => 'Khẩu hiệu (Màu xanh)', 'name' => 'about_vision_highlight', 'type' => 'text', 'default_value' => 'You should be — A Creator!');
    $about_fields[] = array('key' => 'field_about_vision_text', 'label' => 'Nội dung Tầm nhìn', 'name' => 'about_vision_text', 'type' => 'textarea', 'default_value' => 'We believe that no matter who you are or where you are from, you can break through boundaries through AR technology. INMO invites you to explore together and redefine the way we see the world.');

    acf_add_local_field_group(array(
        'key' => 'group_about_page',
        'title' => 'Tùy chỉnh Trang Về Chúng Tôi (About Page)',
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
