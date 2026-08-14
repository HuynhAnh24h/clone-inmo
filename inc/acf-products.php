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

// --- Bắt đầu thêm Khối Layout Đặc biệt (Custom Showcase Block) ---
$fields[] = array(
    'key' => 'field_custom_layout_type',
    'label' => 'Bố cục hiển thị Đặc biệt',
    'name' => 'custom_layout_type',
    'type' => 'select',
    'choices' => array(
        'none'   => 'Không hiển thị',
        'style1' => 'Kiểu 1: Bố cục Bundle (Gói sản phẩm)',
        'style2' => 'Kiểu 2: Bố cục Đặc tính nổi bật (Showcase)',
    ),
    'default_value' => 'none',
    'return_format' => 'value',
    'instructions' => 'Chọn kiểu thiết kế cho khối giới thiệu đặc biệt dưới phần video scroll.',
);
$fields[] = array(
    'key' => 'field_custom_layout_eyebrow',
    'label' => 'Nhãn phụ (Eyebrow)',
    'name' => 'custom_layout_eyebrow',
    'type' => 'text',
    'default_value' => 'What\'s in the bundle?',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_custom_layout_type',
                'operator' => '!=',
                'value' => 'none',
            ),
        ),
    ),
);
$fields[] = array(
    'key' => 'field_custom_layout_title',
    'label' => 'Tiêu đề chính',
    'name' => 'custom_layout_title',
    'type' => 'text',
    'default_value' => 'Everything You Need to See and Hear.',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_custom_layout_type',
                'operator' => '!=',
                'value' => 'none',
            ),
        ),
    ),
);
$fields[] = array(
    'key' => 'field_custom_layout_desc',
    'label' => 'Mô tả chi tiết',
    'name' => 'custom_layout_desc',
    'type' => 'textarea',
    'rows' => 3,
    'default_value' => 'This bundle pairs your Go3 glasses with the GO3 Speaker, giving you immersive audio to match your AI powered view. Two devices, one seamless experience.',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_custom_layout_type',
                'operator' => '!=',
                'value' => 'none',
            ),
        ),
    ),
);
$fields[] = array(
    'key' => 'field_custom_layout_btn_text',
    'label' => 'Chữ trên nút bấm',
    'name' => 'custom_layout_btn_text',
    'type' => 'text',
    'default_value' => 'Claim $100 OFF',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_custom_layout_type',
                'operator' => '!=',
                'value' => 'none',
            ),
        ),
    ),
);
$fields[] = array(
    'key' => 'field_custom_layout_btn_link',
    'label' => 'Đường dẫn nút bấm',
    'name' => 'custom_layout_btn_link',
    'type' => 'url',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_custom_layout_type',
                'operator' => '!=',
                'value' => 'none',
            ),
        ),
    ),
);
$fields[] = array(
    'key' => 'field_custom_layout_img_1',
    'label' => 'Hình ảnh 1',
    'name' => 'custom_layout_img_1',
    'type' => 'image',
    'return_format' => 'url',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_custom_layout_type',
                'operator' => '!=',
                'value' => 'none',
            ),
        ),
    ),
);
$fields[] = array(
    'key' => 'field_custom_layout_img_2',
    'label' => 'Hình ảnh 2',
    'name' => 'custom_layout_img_2',
    'type' => 'image',
    'return_format' => 'url',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_custom_layout_type',
                'operator' => '!=',
                'value' => 'none',
            ),
        ),
    ),
);
$fields[] = array(
    'key' => 'field_custom_layout_product',
    'label' => 'Sản phẩm đi kèm (Thẻ mua nhanh)',
    'name' => 'custom_layout_product',
    'type' => 'post_object',
    'post_type' => array('product'),
    'return_format' => 'id',
    'instructions' => 'Chọn một sản phẩm để hiển thị thẻ mua nhanh nổi (Add to Cart) ở góc dưới bên phải.',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_custom_layout_type',
                'operator' => '!=',
                'value' => 'none',
            ),
        ),
    ),
);
// --- Kết thúc Khối Layout Đặc biệt ---


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

// Lưới 1 (Nhỏ) - Tối đa 5 ảnh
for ($k = 1; $k <= 5; $k++) {
    $fields[] = array(
        'key' => 'field_feature_sm_' . $k . '_img',
        'label' => 'Lưới ảnh nhỏ (Hàng trên) ' . $k . ' - Hình ảnh',
        'name' => 'feature_sm_' . $k . '_img',
        'type' => 'image',
        'return_format' => 'url',
        'wrapper' => array('width' => '33%'),
    );
    $fields[] = array(
        'key' => 'field_feature_sm_' . $k . '_title',
        'label' => 'Lưới ảnh nhỏ (Hàng trên) ' . $k . ' - Tiêu đề',
        'name' => 'feature_sm_' . $k . '_title',
        'type' => 'text',
        'wrapper' => array('width' => '33%'),
    );
    $fields[] = array(
        'key' => 'field_feature_sm_' . $k . '_desc',
        'label' => 'Lưới ảnh nhỏ (Hàng trên) ' . $k . ' - Mô tả',
        'name' => 'feature_sm_' . $k . '_desc',
        'type' => 'textarea',
        'rows' => 2,
        'wrapper' => array('width' => '34%'),
    );
}

// Lưới 2 (Vừa) - Tối đa 3 ảnh
for ($k = 1; $k <= 3; $k++) {
    $fields[] = array(
        'key' => 'field_feature_lg1_' . $k . '_img',
        'label' => 'Lưới ảnh vừa (Hàng giữa) ' . $k . ' - Hình ảnh',
        'name' => 'feature_lg1_' . $k . '_img',
        'type' => 'image',
        'return_format' => 'url',
        'wrapper' => array('width' => '50%'),
    );
    $fields[] = array(
        'key' => 'field_feature_lg1_' . $k . '_title',
        'label' => 'Lưới ảnh vừa (Hàng giữa) ' . $k . ' - Tiêu đề',
        'name' => 'feature_lg1_' . $k . '_title',
        'type' => 'text',
        'wrapper' => array('width' => '50%'),
    );
}

// Lưới 3 (Ngang) - Tối đa 4 ảnh
for ($k = 1; $k <= 4; $k++) {
    $fields[] = array(
        'key' => 'field_feature_lg2_' . $k . '_img',
        'label' => 'Lưới ảnh ngang (Hàng dưới) ' . $k . ' - Hình ảnh',
        'name' => 'feature_lg2_' . $k . '_img',
        'type' => 'image',
        'return_format' => 'url',
        'wrapper' => array('width' => '50%'),
    );
    $fields[] = array(
        'key' => 'field_feature_lg2_' . $k . '_title',
        'label' => 'Lưới ảnh ngang (Hàng dưới) ' . $k . ' - Tiêu đề',
        'name' => 'feature_lg2_' . $k . '_title',
        'type' => 'text',
        'wrapper' => array('width' => '50%'),
    );
}

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

// Dòng máy tương thích - Tối đa 5 máy
for ($k = 1; $k <= 5; $k++) {
    $fields[] = array(
        'key' => 'field_compatible_model_' . $k,
        'label' => 'Tên máy tương thích ' . $k,
        'name' => 'compatible_model_' . $k,
        'type' => 'text',
    );
}

// Link ứng dụng trên Store
$fields[] = array(
    'key' => 'field_app_store_link',
    'label' => 'Link App Store (iOS)',
    'name' => 'app_store_link',
    'type' => 'url',
    'instructions' => 'Đường dẫn đến trang tải ứng dụng trên Apple App Store.',
);
$fields[] = array(
    'key' => 'field_google_play_link',
    'label' => 'Link Google Play / CH Play (Android)',
    'name' => 'google_play_link',
    'type' => 'url',
    'instructions' => 'Đường dẫn đến trang tải ứng dụng trên Google Play Store.',
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

// Đánh giá chuyên gia / Video - Tối đa 5 đánh giá
for ($k = 1; $k <= 5; $k++) {
    $fields[] = array(
        'key' => 'field_testi_' . $k . '_img',
        'label' => 'Đánh giá ' . $k . ' - Hình ảnh (Thumbnail)',
        'name' => 'testi_' . $k . '_img',
        'type' => 'image',
        'return_format' => 'url',
        'wrapper' => array('width' => '25%'),
    );
    $fields[] = array(
        'key' => 'field_testi_' . $k . '_name',
        'label' => 'Đánh giá ' . $k . ' - Tên tác giả',
        'name' => 'testi_' . $k . '_name',
        'type' => 'text',
        'wrapper' => array('width' => '25%'),
    );
    $fields[] = array(
        'key' => 'field_testi_' . $k . '_video',
        'label' => 'Đánh giá ' . $k . ' - Link Video (Youtube/Tiktok...)',
        'name' => 'testi_' . $k . '_video',
        'type' => 'url',
        'wrapper' => array('width' => '25%'),
    );
    $fields[] = array(
        'key' => 'field_testi_' . $k . '_quote',
        'label' => 'Đánh giá ' . $k . ' - Trích dẫn / Tiêu đề',
        'name' => 'testi_' . $k . '_quote',
        'type' => 'textarea',
        'rows' => 2,
        'wrapper' => array('width' => '25%'),
    );
}

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
