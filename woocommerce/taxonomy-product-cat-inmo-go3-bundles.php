<?php
/**
 * Custom template for displaying INMO GO3 Bundles category
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

$current_term = get_queried_object();
$term_id = $current_term->term_id;
$term_name = $current_term->name;
$term_slug = $current_term->slug;

// Get WooCommerce category thumbnail
$thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );
$banner_img_url = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : '';
?>

<!-- Category Banner Section -->
<section class="pg-category-banner" style="background-image: url('<?php echo esc_url($banner_img_url); ?>');">
	<div class="pg-category-banner-overlay"></div>
	<div class="container pg-category-banner-content">
		<nav class="pg-category-breadcrumb" aria-label="breadcrumb">
			<a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door-fill"></i></a>
			<span class="sep">/</span>
			<span class="current"><?php echo esc_html($term_name); ?></span>
		</nav>
		<h1 class="pg-category-title"><?php echo esc_html($term_name); ?></h1>
	</div>
</section>

<!-- Category Products Grid Section -->
<section class="pg-category-products py-5">
	<div class="container">
		<div class="row g-4" id="productGrid">
			<?php
			if ( woocommerce_product_loop() ) {
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
						global $product;
						$rating = $product->get_average_rating();
						$image_id = $product->get_image_id();
						$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'large' ) : wc_placeholder_img_src();
						?>
						<div <?php wc_product_class( 'col-12 col-sm-6 col-md-4 mb-4', $product ); ?>>
							<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="pg-archive-product-card">
								<div class="pg-archive-product-media">
									<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
									<?php if ( $rating > 0 ) : ?>
										<span class="pg-archive-product-rating">
											<i class="bi bi-star-fill"></i><?php echo number_format( $rating, 1 ); ?>
										</span>
									<?php endif; ?>
								</div>
								<div class="pg-archive-product-info">
									<h3 class="pg-archive-product-title"><?php echo esc_html( $product->get_name() ); ?></h3>
									<p class="pg-archive-product-price"><?php echo $product->get_price_html(); ?></p>
								</div>
							</a>
						</div>
						<?php
					}
				}
			} else {
				do_action( 'woocommerce_no_products_found' );
			}
			?>
		</div>
	</div>
</section>

<?php
get_footer( 'shop' );
