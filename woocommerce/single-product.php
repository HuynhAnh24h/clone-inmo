<?php
/**
 * The Template for displaying all single products
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php global $product; ?>
	
	<?php get_template_part( 'template-parts/product/section', 'info' ); ?>
	
	<?php get_template_part( 'template-parts/product/section', 'scroll-video' ); ?>
	
	<?php get_template_part( 'template-parts/product/section', 'custom-showcase' ); ?>
	
	<?php get_template_part( 'template-parts/product/section', 'ergonomic' ); ?>
	
	<?php get_template_part( 'template-parts/product/section', 'ready-cta' ); ?>
	
	<?php get_template_part( 'template-parts/product/section', 'app' ); ?>
	
	<?php get_template_part( 'template-parts/product/section', 'testimonials' ); ?>
	
	<?php get_template_part( 'template-parts/product/section', 'sticky-bar' ); ?>
	
<?php endwhile; // end of the loop. ?>

<?php
get_footer( 'shop' );
