<?php
/**
 * The Template for displaying product archives
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<div class="container py-4 py-md-5 animate-fade-in">
 
  <!-- Breadcrumb -->
  <nav class="pp-breadcrumb mb-3" aria-label="breadcrumb">
	<?php woocommerce_breadcrumb( array( 'delimiter' => ' <span class="sep">/</span> ' ) ); ?>
  </nav>
 
  <!-- Title -->
  <h1 class="pp-title"><?php woocommerce_page_title(); ?></h1>
 
  <!-- Categories Navigation -->
  <?php
  // Get product categories (child categories if on a category page, or top-level categories if on main shop)
  $term_id = is_product_category() ? get_queried_object_id() : 0;
  $categories = get_terms( array(
      'taxonomy'   => 'product_cat',
      'hide_empty' => false,
      'parent'     => $term_id,
  ) );
  
  if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
      echo '<div class="d-flex flex-wrap gap-2 mb-4 mt-3">';
      if ( is_product_category() ) {
          // Link back to main shop
          echo '<a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '" class="btn btn-dark rounded-pill px-3 py-1 text-decoration-none" style="font-size: 0.9rem;">← Tất cả</a>';
      }
      foreach ( $categories as $category ) {
          echo '<a href="' . esc_url( get_term_link( $category ) ) . '" class="btn btn-outline-dark rounded-pill px-3 py-1 text-decoration-none" style="font-size: 0.9rem;">' . esc_html( $category->name ) . '</a>';
      }
      echo '</div>';
  }
  ?>

  <!-- Product grid -->
  <div class="row" id="productGrid">
	<?php
	if ( woocommerce_product_loop() ) {
		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();
				
				// We can override content-product.php or just output the custom HTML here.
				// Let's use the custom HTML structure for each product
				global $product;
				$rating = $product->get_average_rating();
				?>
				<div <?php wc_product_class( 'col-6 col-md-3 mb-4', $product ); ?>>
				  <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="pp-product">
					<div class="pp-product__media">
					  <?php echo $product->get_image( 'woocommerce_thumbnail' ); ?>
					  <?php if ( $rating > 0 ) : ?>
						<span class="pp-product__rating">
						  <i class="bi bi-star-fill"></i><?php echo number_format( $rating, 1 ); ?>
						</span>
					  <?php endif; ?>
					</div>
					<p class="pp-product__title"><?php echo esc_html( $product->get_name() ); ?></p>
					<p class="pp-product__price"><?php echo $product->get_price_html(); ?></p>
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

<?php
get_footer( 'shop' );
