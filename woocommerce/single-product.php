<?php
/**
 * The Template for displaying all single products
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php global $product; ?>
	
	<?php
	// Retrieve display state of sections (default to true if not set)
	$show_scroll_video    = function_exists('get_field') && get_field('show_scroll_video') !== null ? get_field('show_scroll_video') : true;
	$has_scroll_video     = function_exists('get_field') && get_field('scroll_video');

	$show_custom_showcase = function_exists('get_field') && get_field('show_custom_showcase') !== null ? get_field('show_custom_showcase') : true;
	$has_custom_showcase  = function_exists('get_field') && get_field('custom_layout_type') && get_field('custom_layout_type') !== 'none';

	$show_ergonomic       = function_exists('get_field') && get_field('show_ergonomic') !== null ? get_field('show_ergonomic') : true;
	$has_ergonomic        = false;
	if ( function_exists('get_field') ) {
		for ( $k = 1; $k <= 5; $k++ ) {
			if ( get_field('feature_sm_' . $k . '_img') || get_field('feature_sm_' . $k . '_title') ) {
				$has_ergonomic = true;
				break;
			}
		}
	}

	$show_ready_cta       = function_exists('get_field') && get_field('show_ready_cta') !== null ? get_field('show_ready_cta') : true;
	$has_ready_cta        = true; // Uses core product name/info

	$show_app             = function_exists('get_field') && get_field('show_app') !== null ? get_field('show_app') : true;
	$has_app              = function_exists('get_field') && (get_field('app_store_link') || get_field('google_play_link') || get_field('compatible_model_1'));

	$show_testimonials    = function_exists('get_field') && get_field('show_testimonials') !== null ? get_field('show_testimonials') : true;
	$has_testimonials     = false;
	if ( function_exists('get_field') ) {
		for ( $k = 1; $k <= 5; $k++ ) {
			if ( get_field('testi_' . $k . '_img') || get_field('testi_' . $k . '_name') ) {
				$has_testimonials = true;
				break;
			}
		}
	}

	$show_sticky_bar      = function_exists('get_field') && get_field('show_sticky_bar') !== null ? get_field('show_sticky_bar') : true;
	$has_sticky_bar       = true; // Uses core product name/price
	?>
	
	<?php get_template_part( 'template-parts/product/section', 'info' ); ?>
	
	<?php if ( $show_scroll_video && $has_scroll_video ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'scroll-video' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_custom_showcase && $has_custom_showcase ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'custom-showcase' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_ergonomic && $has_ergonomic ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'ergonomic' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_ready_cta && $has_ready_cta ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'ready-cta' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_app && $has_app ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'app' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_testimonials && $has_testimonials ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'testimonials' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_sticky_bar && $has_sticky_bar ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'sticky-bar' ); ?>
	<?php endif; ?>

	<?php
	if ( ! function_exists( 'get_acf_media_url' ) ) {
		function get_acf_media_url( $field_value ) {
			if ( empty( $field_value ) ) {
				return '';
			}
			if ( is_string( $field_value ) ) {
				return $field_value;
			}
			if ( is_array( $field_value ) && isset( $field_value['url'] ) ) {
				return $field_value['url'];
			}
			if ( is_numeric( $field_value ) ) {
				return wp_get_attachment_url( $field_value );
			}
			return '';
		}
	}

	// Pack ACF product data to be consumed by assets/js/theme.js
	$feature_sm = array();
	$feature_lg1 = array();
	$feature_lg2 = array();
	$testimonials = array();

	if ( function_exists('get_field') ) {
		// Feature Sm (Top row)
		for ( $k = 1; $k <= 5; $k++ ) {
			$img = get_acf_media_url( get_field('feature_sm_' . $k . '_img') );
			$title = get_field('feature_sm_' . $k . '_title');
			$desc = get_field('feature_sm_' . $k . '_desc');
			if ( $img || $title || $desc ) {
				$feature_sm[] = array('img' => $img, 'title' => $title, 'desc' => $desc);
			}
		}
		// Feature Lg 1 (Middle row)
		for ( $k = 1; $k <= 3; $k++ ) {
			$img = get_acf_media_url( get_field('feature_lg1_' . $k . '_img') );
			$video = get_acf_media_url( get_field('feature_lg1_' . $k . '_video') );
			$title = get_field('feature_lg1_' . $k . '_title');
			if ( $img || $video || $title ) {
				$feature_lg1[] = array('img' => $img, 'video' => $video, 'title' => $title);
			}
		}
		// Feature Lg 2 (Bottom row)
		for ( $k = 1; $k <= 4; $k++ ) {
			$img = get_acf_media_url( get_field('feature_lg2_' . $k . '_img') );
			$video = get_acf_media_url( get_field('feature_lg2_' . $k . '_video') );
			$title = get_field('feature_lg2_' . $k . '_title');
			if ( $img || $video || $title ) {
				$feature_lg2[] = array('img' => $img, 'video' => $video, 'title' => $title);
			}
		}
		// Testimonials
		for ( $k = 1; $k <= 5; $k++ ) {
			$img = get_acf_media_url( get_field('testi_' . $k . '_img') );
			$name = get_field('testi_' . $k . '_name');
			$video = get_acf_media_url( get_field('testi_' . $k . '_video') );
			$quote = get_field('testi_' . $k . '_quote');
			if ( $img || $name || $video || $quote ) {
				$testimonials[] = array(
					'img' => $img,
					'name' => $name,
					'video_url' => $video,
					'quote' => $quote
				);
			}
		}
	}
	?>
	<script>
		window.acfProductData = {
			featureSm: <?php echo json_encode(!empty($feature_sm) ? $feature_sm : null); ?>,
			featureLg1: <?php echo json_encode(!empty($feature_lg1) ? $feature_lg1 : null); ?>,
			featureLg2: <?php echo json_encode(!empty($feature_lg2) ? $feature_lg2 : null); ?>,
			testimonials: <?php echo json_encode(!empty($testimonials) ? $testimonials : null); ?>
		};
	</script>
	
<?php endwhile; // end of the loop. ?>

<?php
get_footer( 'shop' );
