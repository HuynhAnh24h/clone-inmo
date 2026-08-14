<?php
/**
 * Template part for Ready CTA section
 */
global $product;
?>
<div class="pg-dark-section pg-ready" style="padding-top: 0">
	<h2>Bạn Đã Sẵn Sàng Trải Nghiệm <?php echo esc_html($product->get_name()); ?>?</h2>
	<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>?add-to-cart=<?php echo esc_attr( $product->get_id() ); ?>" class="btn-pg-cta">
		Mua Ngay <i class="bi bi-arrow-right ms-1"></i>
	</a>
</div>
