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
	wp_enqueue_style( 'inmo-theme-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), wp_get_theme()->get( 'Version' ) );

	// Scripts
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '5.3', true );
    wp_enqueue_script( 'splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '4.1.4', true );
	wp_enqueue_script( 'inmo-theme-main-js', get_template_directory_uri() . '/assets/js/theme.js', array('splide-js'), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'inmo_theme_scripts' );

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
