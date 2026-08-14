<?php
/**
 * Template Name: INMO GO3 Bundles Page
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

// Get page featured image for banner background
$banner_img_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
?>

<!-- Category Banner Section -->
<section class="pg-category-banner" style="background-image: url('<?php echo esc_url($banner_img_url); ?>');">
	<div class="pg-category-banner-overlay"></div>
	<div class="container pg-category-banner-content">
		<nav class="pg-category-breadcrumb" aria-label="breadcrumb">
			<a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door-fill"></i></a>
			<span class="sep">/</span>
			<span class="current"><?php the_title(); ?></span>
		</nav>
		<h1 class="pg-category-title"><?php the_title(); ?></h1>
	</div>
</section>

<!-- Category Products Grid Section -->
<section class="pg-category-products py-5">
	<div class="container">
		<div class="row g-4" id="productGrid">
			<?php
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => -1,
				'tax_query'      => array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => 'inmo-go3-bundles',
					),
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => 'go3',
					),
				),
			);
			
			$query = new WP_Query( $args );
			
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
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
				wp_reset_postdata();
			} else {
				echo '<div class="col-12 text-center py-5"><p>Chưa có sản phẩm nào trong danh mục này.</p></div>';
			}
			?>
		</div>
	</div>
</section>

<?php
get_footer( 'shop' );
