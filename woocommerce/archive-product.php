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
	<?php woocommerce_breadcrumb( array( 
        'delimiter' => ' <span class="sep">/</span> ',
        'home'      => '<i class="bi bi-house-door-fill icon-shake" style="font-size: 1.1rem; line-height: 1;"></i>'
    ) ); ?>
  </nav>
 
  <!-- Title -->
  <h1 class="theme-title"><?php woocommerce_page_title(); ?></h1>
 
  <!-- Categories Navigation (Rendered via JS) -->
  <div id="woo-category-wrap" class="d-flex flex-wrap gap-2 mb-4 mt-3"></div>

  <?php
  // Get product categories (child categories if on a category page, or top-level categories if on main shop)
  $term_id = is_product_category() ? get_queried_object_id() : 0;
  $categories = get_terms( array(
      'taxonomy'   => 'product_cat',
      'hide_empty' => false,
      'parent'     => $term_id,
  ) );

  $cats_array = array();
  if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
      if ( is_product_category() ) {
          $cats_array[] = array(
              'name' => '← Tất cả',
              'url'  => esc_url( wc_get_page_permalink( 'shop' ) ),
              'is_back' => true
          );
      }
      foreach ( $categories as $category ) {
          $cats_array[] = array(
              'name' => esc_html( $category->name ),
              'url'  => esc_url( get_term_link( $category ) ),
              'is_back' => false
          );
      }
  }
  ?>
  <script>
      const wooCategoriesData = <?php echo json_encode( $cats_array ); ?>;
      document.addEventListener('DOMContentLoaded', function() {
          const catWrap = document.getElementById('woo-category-wrap');
          if (catWrap && wooCategoriesData && wooCategoriesData.length > 0) {
              wooCategoriesData.forEach(cat => {
                  const a = document.createElement('a');
                  a.href = cat.url;
                  a.className = cat.is_back ? 'btn btn-dark rounded-pill px-3 py-1 text-decoration-none' : 'btn btn-outline-dark rounded-pill px-3 py-1 text-decoration-none';
                  a.style.fontSize = '0.9rem';
                  a.textContent = cat.name;
                  catWrap.appendChild(a);
              });
          }
      });
  </script>

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
