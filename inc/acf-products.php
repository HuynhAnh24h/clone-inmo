<?php
if( function_exists('acf_add_local_field_group') ):

$fields = array();

// ==========================
// TAB 1: Nội dung chung
// ==========================
$fields[] = array(
    'key' => 'field_tab_general',
    'label' => 'Nội dung chung',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
);
$fields[] = array(
    'key' => 'field_product_banner_image',
    'label' => 'Ảnh Banner Lớn (Full Width)',
    'name' => 'product_banner_image',
    'type' => 'image',
    'return_format' => 'url',
    'instructions' => 'Hình ảnh banner nằm giữa trang (All-Day Style, Non-Stop Power).',
);
// --- Bắt đầu thêm video scroll cố định và nội dung trượt đè ---
$fields[] = array(
    'key' => 'field_scroll_video',
    'label' => 'Video Scroll Cố định',
    'name' => 'scroll_video',
    'type' => 'file',
    'return_format' => 'url',
    'mime_types' => 'mp4,webm,ogg',
    'instructions' => 'Chọn hoặc tải lên video MP4 làm nền cho section scroll cố định.',
);
$fields[] = array(
    'key' => 'field_scroll_video_title',
    'label' => 'Tiêu đề Section Video',
    'name' => 'scroll_video_title',
    'type' => 'text',
    'default_value' => 'All-Day Style, Non-Stop Power',
    'instructions' => 'Tiêu đề hiển thị trượt đè lên video nền khi cuộn xuống.',
);
$fields[] = array(
    'key' => 'field_scroll_video_desc',
    'label' => 'Mô tả Section Video',
    'name' => 'scroll_video_desc',
    'type' => 'textarea',
    'rows' => 2,
    'default_value' => 'Fashion-forward smart glasses designed for daily wear with long-lasting battery life.',
);
$fields[] = array(
    'key' => 'field_scroll_video_btn_text',
    'label' => 'Chữ nút bấm Section Video',
    'name' => 'scroll_video_btn_text',
    'type' => 'text',
    'default_value' => 'Check How It Works',
);
$fields[] = array(
    'key' => 'field_scroll_video_btn_link',
    'label' => 'Link nút bấm Section Video',
    'name' => 'scroll_video_btn_link',
    'type' => 'url',
);
// --- Kết thúc thêm video scroll ---
$fields[] = array(
    'key' => 'field_ergonomic_heading',
    'label' => 'Tiêu đề phần Thiết kế',
    'name' => 'ergonomic_heading',
    'type' => 'text',
    'default_value' => 'Ergonomic Design for All-Day Comfort',
);
$fields[] = array(
    'key' => 'field_ergonomic_subheading',
    'label' => 'Mô tả phụ phần Thiết kế',
    'name' => 'ergonomic_subheading',
    'type' => 'text',
    'default_value' => 'Precision crafted for lightweight performance',
);

// ==========================
// TAB 2: Tính năng (Accordion)
// ==========================
$fields[] = array(
    'key' => 'field_tab_accordion',
    'label' => 'Tính năng (Accordion)',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
);
for ($i = 1; $i <= 5; $i++) {
    $fields[] = array(
        'key' => 'field_feature_' . $i . '_title',
        'label' => 'Tiêu đề Tính năng ' . $i,
        'name' => 'feature_' . $i . '_title',
        'type' => 'text',
    );
    $fields[] = array(
        'key' => 'field_feature_' . $i . '_body',
        'label' => 'Nội dung Tính năng ' . $i,
        'name' => 'feature_' . $i . '_body',
        'type' => 'textarea',
    );
}

// ==========================
// TAB 3: Gallery Thiết kế
// ==========================
$fields[] = array(
    'key' => 'field_tab_gallery',
    'label' => 'Gallery Thiết kế',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
);

// Lưới 1 (Nhỏ)
$fields[] = array(
    'key' => 'field_feature_sm_data',
    'label' => 'Lưới ảnh nhỏ (Hàng trên cùng)',
    'name' => 'feature_sm_data',
    'type' => 'repeater',
    'button_label' => 'Thêm ảnh',
    'layout' => 'table',
    'sub_fields' => array(
        array(
            'key' => 'field_f_sm_img',
            'label' => 'Hình ảnh',
            'name' => 'img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_f_sm_title',
            'label' => 'Tiêu đề',
            'name' => 'title',
            'type' => 'text',
        ),
    ),
);

// Lưới 2 (Vừa)
$fields[] = array(
    'key' => 'field_feature_lg_data_1',
    'label' => 'Lưới ảnh vừa (Hàng giữa)',
    'name' => 'feature_lg_data_1',
    'type' => 'repeater',
    'button_label' => 'Thêm ảnh',
    'layout' => 'table',
    'sub_fields' => array(
        array(
            'key' => 'field_f_lg1_img',
            'label' => 'Hình ảnh',
            'name' => 'img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_f_lg1_title',
            'label' => 'Tiêu đề',
            'name' => 'title',
            'type' => 'text',
        ),
    ),
);

// Lưới 3 (Ngang)
$fields[] = array(
    'key' => 'field_feature_lg_data_2',
    'label' => 'Lưới ảnh ngang (Hàng dưới)',
    'name' => 'feature_lg_data_2',
    'type' => 'repeater',
    'button_label' => 'Thêm ảnh',
    'layout' => 'table',
    'sub_fields' => array(
        array(
            'key' => 'field_f_lg2_img',
            'label' => 'Hình ảnh',
            'name' => 'img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_f_lg2_title',
            'label' => 'Tiêu đề',
            'name' => 'title',
            'type' => 'text',
        ),
    ),
);

// ==========================
// TAB 4: INMO App
// ==========================
$fields[] = array(
    'key' => 'field_tab_app',
    'label' => 'INMO App',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
);
$fields[] = array(
    'key' => 'field_compatible_models',
    'label' => 'Dòng máy tương thích',
    'name' => 'compatible_models',
    'type' => 'repeater',
    'button_label' => 'Thêm máy tương thích',
    'layout' => 'table',
    'sub_fields' => array(
        array(
            'key' => 'field_comp_model_name',
            'label' => 'Tên máy',
            'name' => 'model_name',
            'type' => 'text',
        ),
    ),
);

// ==========================
// TAB 5: Trải nghiệm (Testimonials)
// ==========================
$fields[] = array(
    'key' => 'field_tab_testimonials',
    'label' => 'Trải nghiệm (Testimonials)',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
);
$fields[] = array(
    'key' => 'field_testimonials',
    'label' => 'Đánh giá chuyên gia / Video',
    'name' => 'testimonials',
    'type' => 'repeater',
    'button_label' => 'Thêm đánh giá',
    'layout' => 'block',
    'sub_fields' => array(
        array(
            'key' => 'field_testi_img',
            'label' => 'Hình ảnh (Thumbnail)',
            'name' => 'img',
            'type' => 'image',
            'return_format' => 'url',
            'wrapper' => array('width' => '30%'),
        ),
        array(
            'key' => 'field_testi_name',
            'label' => 'Tên tác giả',
            'name' => 'name',
            'type' => 'text',
            'wrapper' => array('width' => '25%'),
        ),
        array(
            'key' => 'field_testi_video',
            'label' => 'Link Video (Youtube/Tiktok...)',
            'name' => 'video_url',
            'type' => 'url',
            'wrapper' => array('width' => '25%'),
        ),
        array(
            'key' => 'field_testi_quote',
            'label' => 'Trích dẫn / Tiêu đề',
            'name' => 'quote',
            'type' => 'textarea',
            'rows' => 3,
            'wrapper' => array('width' => '30%'),
        ),
    ),
);

// ==========================
// TAB 6: Các Tab Tùy chỉnh (Hiện có)
// ==========================
$fields[] = array(
    'key' => 'field_tab_custom',
    'label' => 'Tab & Ghi chú Tùy chỉnh',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
);
$fields[] = array(
    'key' => 'field_custom_note_1',
    'label' => 'Ghi chú tùy chỉnh 1',
    'name' => 'custom_note_1',
    'type' => 'text',
);
$fields[] = array(
    'key' => 'field_custom_note_2',
    'label' => 'Ghi chú tùy chỉnh 2',
    'name' => 'custom_note_2',
    'type' => 'text',
);

// Thêm 3 Tabs
for ($j = 1; $j <= 3; $j++) {
    $fields[] = array(
        'key' => 'field_tab_' . $j . '_title',
        'label' => 'Tiêu đề Custom Tab ' . $j,
        'name' => 'tab_' . $j . '_title',
        'type' => 'text',
    );
    $fields[] = array(
        'key' => 'field_tab_' . $j . '_content',
        'label' => 'Nội dung Custom Tab ' . $j,
        'name' => 'tab_' . $j . '_content',
        'type' => 'wysiwyg',
    );
}

// Đăng ký Field Group
acf_add_local_field_group(array(
    'key' => 'group_product_additional_data',
    'title' => 'Dữ liệu Giao diện Chi tiết Sản phẩm',
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
    'description' => 'Quản lý toàn bộ dữ liệu động (Banner, Gallery, Testimonials) trên trang chi tiết sản phẩm.',
));

endif;
