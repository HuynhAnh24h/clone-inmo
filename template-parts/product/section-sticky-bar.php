<?php
/**
 * Template part for Sticky Add-to-Cart Bar
 */
global $product;

if ( !$product ) {
	return;
}

$prod_id = $product->get_id();
$prod_title = $product->get_name();
$prod_price = $product->get_price_html();
$prod_thumb = wp_get_attachment_image_url( $product->get_image_id(), 'thumbnail' );
$add_to_cart_url = esc_url( wc_get_checkout_url() . '?add-to-cart=' . $prod_id );
?>
<div class="pg-sticky-buy-bar" id="pgStickyBuyBar">
	<?php if ( $prod_thumb ) : ?>
		<div class="bar-thumb">
			<img src="<?php echo esc_url( $prod_thumb ); ?>" alt="<?php echo esc_attr( $prod_title ); ?>">
		</div>
	<?php endif; ?>
	<div class="bar-details">
		<h4 class="bar-title"><?php echo esc_html( $prod_title ); ?></h4>
		<span class="bar-price"><?php echo $prod_price; ?></span>
	</div>
	<div class="bar-action">
		<a href="<?php echo $add_to_cart_url; ?>" class="btn-bar-buy pg-sticky-bar-btn">Thêm vào giỏ hàng</a>
	</div>
</div>
