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
	$show_custom_showcase = function_exists('get_field') && get_field('show_custom_showcase') !== null ? get_field('show_custom_showcase') : true;
	$show_ergonomic       = function_exists('get_field') && get_field('show_ergonomic') !== null ? get_field('show_ergonomic') : true;
	$show_ready_cta       = function_exists('get_field') && get_field('show_ready_cta') !== null ? get_field('show_ready_cta') : true;
	$show_app             = function_exists('get_field') && get_field('show_app') !== null ? get_field('show_app') : true;
	$show_testimonials    = function_exists('get_field') && get_field('show_testimonials') !== null ? get_field('show_testimonials') : true;
	$show_sticky_bar      = function_exists('get_field') && get_field('show_sticky_bar') !== null ? get_field('show_sticky_bar') : true;
	?>
	
	<?php get_template_part( 'template-parts/product/section', 'info' ); ?>
	
	<?php if ( $show_scroll_video ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'scroll-video' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_custom_showcase ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'custom-showcase' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_ergonomic ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'ergonomic' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_ready_cta ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'ready-cta' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_app ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'app' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_testimonials ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'testimonials' ); ?>
	<?php endif; ?>
	
	<?php if ( $show_sticky_bar ) : ?>
		<?php get_template_part( 'template-parts/product/section', 'sticky-bar' ); ?>
	<?php endif; ?>
	
<?php endwhile; // end of the loop. ?>

<?php
get_footer( 'shop' );
