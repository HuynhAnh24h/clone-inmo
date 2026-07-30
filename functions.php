<?php
/**
 * Theme functions and definitions
 */

if ( ! function_exists( 'inmo_theme_setup' ) ) :
	function inmo_theme_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'inmo-theme' ),
				'footer' => esc_html__( 'Footer Menu', 'inmo-theme' ),
			)
		);

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add WooCommerce support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'inmo_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function inmo_theme_scripts() {
	// Bootstrap icons
	wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css', array(), '1.13.1' );
	
    // Splide CSS
	wp_enqueue_style( 'splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), '4.1.4' );

	// Main theme styles
	wp_enqueue_style( 'inmo-theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'inmo-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.3' );
	wp_enqueue_style( 'inmo-theme-core-style', get_template_directory_uri() . '/assets/css/theme-core.css', array('inmo-bootstrap-style'), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'inmo-theme-main-style', get_template_directory_uri() . '/assets/css/style.css', array('inmo-theme-core-style'), wp_get_theme()->get( 'Version' ) );

	// Scripts
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '5.3', true );
    wp_enqueue_script( 'splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '4.1.4', true );
	wp_enqueue_script( 'inmo-theme-main-js', get_template_directory_uri() . '/assets/js/theme.js', array('splide-js'), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'inmo_theme_scripts' );

/**
 * Add defer to JS scripts for performance
 */
function inmo_defer_scripts( $tag, $handle, $src ) {
    $defer_scripts = array( 'bootstrap-js', 'splide-js', 'inmo-theme-main-js' );
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . esc_url($src) . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'inmo_defer_scripts', 10, 3 );

/**
 * Remove WP Bloat for Performance
 */
function inmo_disable_wp_bloat() {
    // Remove Emoji
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    
    // Remove oEmbed
    wp_deregister_script('wp-embed');
    
    // Remove classic theme styles
    wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'init', 'inmo_disable_wp_bloat' );
add_action( 'wp_enqueue_scripts', 'inmo_disable_wp_bloat', 100 );

/**
 * Add Preconnect to CDN
 */
function inmo_preconnect_cdn() {
    echo '<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>' . "\n";
    echo '<link rel="dns-prefetch" href="https://cdn.jsdelivr.net">' . "\n";
}
add_action('wp_head', 'inmo_preconnect_cdn', 1);

/**
 * Add WooCommerce Cart fragments for AJAX cart update
 */
function inmo_theme_cart_count_fragments( $fragments ) {
    ob_start();
    ?>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count-badge" style="font-size: 0.6rem; transform: translate(-30%, 10%) !important;">
        <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
    </span>
    <?php
    $fragments['span.cart-count-badge'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'inmo_theme_cart_count_fragments' );

/**
 * Mega Menu Logic
 */
function inmo_theme_mega_menu_class( $classes, $item, $args, $depth ) {
    if ( strcasecmp( trim( $item->title ), 'sản phẩm' ) === 0 || strcasecmp( trim( $item->title ), 'products' ) === 0 ) {
        $classes[] = 'has-mega-menu';
        $classes[] = 'position-relative';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'inmo_theme_mega_menu_class', 10, 4 );

function inmo_theme_mega_menu( $item_output, $item, $depth, $args ) {
    if ( strcasecmp( trim( $item->title ), 'sản phẩm' ) === 0 || strcasecmp( trim( $item->title ), 'products' ) === 0 ) {
        $mega_menu = '<div class="mega-menu-dropdown">';
        $mega_menu .= inmo_get_hierarchical_categories_html();
        $mega_menu .= '</div>';
        $item_output .= $mega_menu;
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'inmo_theme_mega_menu', 10, 4 );

function inmo_get_hierarchical_categories_html($parent_id = 0) {
    $categories = get_terms( array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => $parent_id,
    ) );
    
    $html = '';
    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
        $html .= '<ul class="mega-menu-list">';
        foreach ( $categories as $cat ) {
            // Exclude "Chưa phân loại"
            if ( $cat->slug === 'uncategorized' || $cat->slug === 'chua-phan-loai' ) continue;
            
            $html .= '<li>';
            $html .= '<a href="' . esc_url( get_term_link( $cat ) ) . '">' . esc_html( $cat->name ) . '</a>';
            $html .= inmo_get_hierarchical_categories_html( $cat->term_id );
            $html .= '</li>';
        }
        
        // Add "All" link at the bottom only for the top level
        if ( $parent_id == 0 ) {
            $html .= '<li><a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '">Tất cả</a></li>';
        }
        
        $html .= '</ul>';
    }
    return $html;
}

// Tự động load cấu hình Custom Fields nếu ACF đã kích hoạt
if ( file_exists( get_template_directory() . '/inc/acf-fields-home.php' ) ) {
    require_once get_template_directory() . '/inc/acf-fields-home.php';
}
if ( file_exists( get_template_directory() . '/inc/acf-fields-about.php' ) ) {
    require_once get_template_directory() . '/inc/acf-fields-about.php';
}
if ( file_exists( get_template_directory() . '/inc/acf-products.php' ) ) {
    require_once get_template_directory() . '/inc/acf-products.php';
}

/**
 * AJAX Search functionality
 */
function inmo_ajax_search_scripts() {
    wp_localize_script( 'inmo-theme-main-js', 'inmo_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'inmo_ajax_search_scripts', 99 );

function inmo_ajax_search() {
    $search_term = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';
    
    if ( empty($search_term) ) {
        wp_send_json_success('');
    }
    
    $args = array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        's'              => $search_term,
        'posts_per_page' => 6,
    );
    
    $query = new WP_Query($args);
    $html = '';
    
    if ($query->have_posts()) {
        $html .= '<div class="list-group list-group-flush border-0 mb-3">';
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
            $html .= '<a href="' . get_permalink() . '" class="list-group-item list-group-item-action d-flex align-items-center border-0 p-2 mb-2" style="border-radius: 8px; background: #fff; transition: background 0.2s;">';
            if ( has_post_thumbnail() ) {
                $html .= '<div class="flex-shrink-0 me-3" style="width: 50px; height: 50px; background: #f9f9f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; overflow: hidden;">';
                $html .= get_the_post_thumbnail( get_the_ID(), 'thumbnail', array( 'style' => 'width: 100%; height: 100%; object-fit: contain;' ) );
                $html .= '</div>';
            }
            $html .= '<div class="flex-grow-1">';
            $html .= '<h6 class="mb-1 text-dark" style="font-size: 14px; font-weight: 600;">' . get_the_title() . '</h6>';
            $html .= '<small class="text-muted d-block" style="font-size: 13px;">' . $product->get_price_html() . '</small>';
            $html .= '</div>';
            $html .= '</a>';
        }
        $html .= '</div>';
        $html .= '<a href="' . esc_url( home_url( '/?s=' . urlencode($search_term) . '&post_type=product' ) ) . '" class="btn w-100" style="background-color: #f4f4f4; color: #111; font-weight: 500; border-radius: 10px; transition: background-color 0.2s;">Xem tất cả kết quả</a>';
    } else {
        $html .= '<div class="text-center py-5 text-muted">';
        $html .= '<i class="bi bi-search fs-1 mb-3 d-block text-light"></i>';
        $html .= '<p>Không tìm thấy sản phẩm nào phù hợp.</p>';
        $html .= '</div>';
    }
    
    wp_reset_postdata();
    wp_send_json_success($html);
}
add_action('wp_ajax_inmo_ajax_search', 'inmo_ajax_search');
add_action('wp_ajax_nopriv_inmo_ajax_search', 'inmo_ajax_search');

/**
 * Custom WooCommerce Breadcrumb Defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'inmo_custom_woocommerce_breadcrumbs' );
function inmo_custom_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => ' &nbsp;&nbsp;/&nbsp;&nbsp; ',
        'wrap_before' => '<nav class="woocommerce-breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '',
        'after'       => '',
        'home'        => '<i class="bi bi-house-door-fill icon-shake" style="font-size: 1.1rem; line-height: 1;"></i>',
    );
}

/**
 * Thêm Custom Tabs cho WooCommerce từ ACF
 */
add_filter( 'woocommerce_product_tabs', 'inmo_custom_product_tabs' );
function inmo_custom_product_tabs( $tabs ) {
    if ( ! function_exists('get_field') ) return $tabs;

    for ( $i = 1; $i <= 3; $i++ ) {
        $tab_title = get_field( 'tab_' . $i . '_title' );
        $tab_content = get_field( 'tab_' . $i . '_content' );

        if ( $tab_title && $tab_content ) {
            $tabs['custom_tab_' . $i] = array(
                'title'    => esc_html( $tab_title ),
                'priority' => 50 + $i,
                'callback' => 'inmo_custom_tab_content_callback',
                'tab_index' => $i
            );
        }
    }
    return $tabs;
}

function inmo_custom_tab_content_callback( $key, $tab ) {
    if ( ! function_exists('get_field') ) return;
    $index = isset($tab['tab_index']) ? $tab['tab_index'] : 1;
    $content = get_field( 'tab_' . $index . '_content' );
    echo '<div class="custom-tab-content">';
    echo wp_kses_post( $content );
    echo '</div>';
}

if ( file_exists( get_template_directory() . '/inc/crm-mini.php' ) ) {
    require_once get_template_directory() . '/inc/crm-mini.php';
}

/**
 * Hàm tạo Email Template Đen/Trắng
 */
function inmo_get_email_template($content) {
    $logo_id = get_theme_mod( 'custom_logo' );
    $logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';
    $logo_html = $logo_url ? '<img src="'.esc_url($logo_url).'" alt="INMO Logo" style="max-height: 40px;">' : '<h2 style="color:#000;">INMO</h2>';
    $content_html = nl2br(esc_html($content));
    
    return '
    <div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 40px 0;">
        <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px; border: 1px solid #e0e0e0; border-radius: 4px;">
            <div style="margin-bottom: 30px; text-align: center; border-bottom: 2px solid #000000; padding-bottom: 20px;">
                ' . $logo_html . '
            </div>
            <div style="font-size: 16px; line-height: 1.6; color: #000000; text-align: left;">
                ' . $content_html . '
            </div>
            <div style="margin-top: 40px; text-align: center;">
                <a href="' . home_url() . '" style="display: inline-block; background-color: #000000; color: #ffffff; text-decoration: none; padding: 14px 32px; border-radius: 50px; font-weight: bold; font-size: 15px;">Ghé thăm Website</a>
            </div>
            <div style="margin-top: 40px; font-size: 12px; color: #666666; border-top: 1px solid #eeeeee; padding-top: 20px; text-align: center;">
                Bạn nhận được email này từ hệ thống của ' . get_bloginfo('name') . '.<br>Bản quyền &copy; ' . date('Y') . ' INMO.
            </div>
        </div>
    </div>';
}

/**
 * Xử lý AJAX Form Liên hệ
 */
add_action('wp_ajax_inmo_submit_contact_form', 'inmo_handle_contact_form');
add_action('wp_ajax_nopriv_inmo_submit_contact_form', 'inmo_handle_contact_form');
function inmo_handle_contact_form() {
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : 'Không có chủ đề';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Vui lòng điền đầy đủ các trường bắt buộc.');
    }

    // 0. Lưu vào CRM Mini Database
    $post_id = wp_insert_post(array(
        'post_title'   => $name,
        'post_type'    => 'inmo_contact',
        'post_status'  => 'publish'
    ));

    if ( $post_id && ! is_wp_error( $post_id ) ) {
        update_post_meta( $post_id, 'email', $email );
        update_post_meta( $post_id, 'phone', $phone );
        update_post_meta( $post_id, 'subject', $subject );
        update_post_meta( $post_id, 'message', $message );
    }

    $admin_email = get_option('admin_email');
    $mail_subject = "Liên hệ mới từ website: " . $subject;
    
    $mail_body = "Bạn vừa nhận được một liên hệ mới từ website.\n\n";
    $mail_body .= "Họ và tên: $name\n";
    $mail_body .= "Email: $email\n";
    $mail_body .= "Số điện thoại: $phone\n";
    $mail_body .= "Chủ đề: $subject\n";
    $mail_body .= "Nội dung:\n$message\n";

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';

    $admin_html = inmo_get_email_template($mail_body);
    $sent = wp_mail($admin_email, $mail_subject, $admin_html, $headers);

    // Gửi Auto-reply cho Khách hàng
    $customer_subject = "Đã nhận thông tin liên hệ - " . get_bloginfo('name');
    $customer_body = "Xin chào $name,\n\n";
    $customer_body .= "Cảm ơn bạn đã liên hệ với chúng tôi. Hệ thống đã ghi nhận thông tin của bạn với nội dung:\n\n";
    $customer_body .= "Chủ đề: $subject\n";
    $customer_body .= "Nội dung: $message\n\n";
    $customer_body .= "Đội ngũ chăm sóc khách hàng của chúng tôi sẽ xem xét và phản hồi lại cho bạn trong thời gian sớm nhất.\n\n";
    $customer_body .= "Trân trọng,\nĐội ngũ " . get_bloginfo('name') . ".";
    
    $customer_html = inmo_get_email_template($customer_body);
    wp_mail($email, $customer_subject, $customer_html, array('Content-Type: text/html; charset=UTF-8'));

    if ($sent) {
        wp_send_json_success('Gửi tin nhắn thành công, chúng tôi sẽ liên hệ lại sớm nhất.');
    } else {
        wp_send_json_error('Có lỗi xảy ra khi gửi email. Vui lòng thử lại sau.');
    }
}

/**
 * Xử lý AJAX Form Đăng ký nhận mã ưu đãi
 */
add_action('wp_ajax_inmo_submit_discount_form', 'inmo_handle_discount_form');
add_action('wp_ajax_nopriv_inmo_submit_discount_form', 'inmo_handle_discount_form');
function inmo_handle_discount_form() {
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

    if (empty($email) || !is_email($email)) {
        wp_send_json_error('Vui lòng nhập một địa chỉ email hợp lệ.');
    }

    // 0. Lưu vào CRM Mini Database
    wp_insert_post(array(
        'post_title'   => $email,
        'post_type'    => 'inmo_discount',
        'post_status'  => 'publish'
    ));

    $admin_email = get_option('admin_email');
    
    // 1. Gửi thông báo cho Admin
    $admin_subject = "Đăng ký nhận mã ưu đãi mới";
    $admin_body = "Có một khách hàng vừa đăng ký nhận mã ưu đãi.\nEmail: $email\n";
    wp_mail($admin_email, $admin_subject, inmo_get_email_template($admin_body), array('Content-Type: text/html; charset=UTF-8'));

    // Lấy mã ưu đãi từ cấu hình ACF (trang chủ)
    $front_page_id = get_option('page_on_front');
    $discount_code = function_exists('get_field') ? get_field('discount_code_send', $front_page_id) : 'WELCOME10';
    if (!$discount_code) $discount_code = 'WELCOME10';

    // 2. Gửi Auto-reply cho Khách hàng
    $customer_subject = "Mã ưu đãi đặc biệt từ INMO";
    $customer_body = "Cảm ơn bạn đã đăng ký nhận thông tin từ INMO.\n\n";
    $customer_body .= "Đây là mã ưu đãi của bạn để sử dụng khi mua hàng:\n";
    $customer_body .= "MÃ ƯU ĐÃI: " . $discount_code . "\n\n";
    $customer_body .= "Trân trọng,\nĐội ngũ INMO.";

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $customer_html = inmo_get_email_template($customer_body);
    
    $sent = wp_mail($email, $customer_subject, $customer_html, $headers);

    if ($sent) {
        wp_send_json_success('Đăng ký thành công! Vui lòng kiểm tra email (kể cả hộp thư rác) để nhận mã ưu đãi.');
    } else {
        // Fallback in case mail fails to send, still show success so they aren't stuck, or show error
        wp_send_json_error('Có lỗi xảy ra. Hãy chắc chắn cấu hình SMTP của website đang hoạt động.');
    }
}

/**
 * Xử lý AJAX Gửi Email Hàng Loạt (Bulk Email)
 */
add_action('wp_ajax_inmo_send_bulk_email_batch', 'inmo_handle_bulk_email_batch');
function inmo_handle_bulk_email_batch() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( 'Bạn không có quyền thực hiện thao tác này.' );
    }

    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
    $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : 'Ưu đãi từ INMO';
    $content = isset($_POST['content']) ? sanitize_textarea_field($_POST['content']) : '';
    
    $batch_size = 50;

    // Lấy tổng số người đăng ký
    $total_query = new WP_Query(array(
        'post_type' => 'inmo_discount',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids'
    ));
    $total_emails = $total_query->found_posts;

    // Lấy 50 người của đợt này
    $batch_query = new WP_Query(array(
        'post_type' => 'inmo_discount',
        'post_status' => 'publish',
        'posts_per_page' => $batch_size,
        'offset' => $offset,
    ));

    if ( ! $batch_query->have_posts() ) {
        wp_send_json_success(array('done' => true, 'total' => $total_emails, 'sent' => $total_emails));
    }

    // Build HTML Template
    $html_body = inmo_get_email_template($content);

    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    // Gửi mail cho từng người trong đợt này
    foreach ( $batch_query->posts as $post ) {
        $to_email = $post->post_title;
        if ( is_email( $to_email ) ) {
            wp_mail( $to_email, $subject, $html_body, $headers );
        }
    }

    $new_offset = $offset + $batch_size;
    $done = ($new_offset >= $total_emails);

    wp_send_json_success(array(
        'done' => $done,
        'total' => $total_emails,
        'sent' => min($new_offset, $total_emails),
        'next_offset' => $new_offset
    ));
}
