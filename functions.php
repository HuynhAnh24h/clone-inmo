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
