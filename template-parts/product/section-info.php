<?php
/**
 * Template part for product info section
 */
global $product;
?>
<section class="pg-product animate-fade-in">
	<div class="container-fluid px-3 px-md-5">
		<?php woocommerce_output_all_notices(); ?>
		<div class="row g-5">
		<div class="col-lg-7">
			<div class="pg-gallery">
				<div class="pg-thumbs" id="thumbsWrap">
					<?php
					$attachment_ids = $product->get_gallery_image_ids();
					$main_image_url = wp_get_attachment_image_url( $product->get_image_id(), 'full' );
					
					if ( $product->get_image_id() ) {
						echo '<img src="' . esc_url( wp_get_attachment_image_url( $product->get_image_id(), 'thumbnail' ) ) . '" class="is-active" data-full="' . esc_url( $main_image_url ) . '" alt="">';
					}
					
					if ( $attachment_ids && $product->get_image_id() ) {
						foreach ( $attachment_ids as $attachment_id ) {
							echo '<img src="' . esc_url( wp_get_attachment_image_url( $attachment_id, 'thumbnail' ) ) . '" data-full="' . esc_url( wp_get_attachment_image_url( $attachment_id, 'full' ) ) . '" alt="">';
						}
					}
					?>
				</div>
				<div class="pg-main-image">
					<img id="mainImage" src="<?php echo esc_url( $main_image_url ); ?>" alt="<?php the_title_attribute(); ?>" />
				</div>
			</div>
		</div>

		<div class="col-lg-5">
			<h1 class="pg-info__title"><?php the_title(); ?></h1>
			<div class="pg-info__price"><?php echo $product->get_price_html(); ?></div>
			
			<?php 
			$note1 = function_exists('get_field') && get_field('custom_note_1') ? get_field('custom_note_1') : 'Người ủng hộ Kickstarter được ưu tiên giao hàng.';
			echo '<p class="pg-top-note">' . esc_html( $note1 ) . '</p>';
			?>

			<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
				<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />
				<div class="pg-cart-wrap">
					<div class="pg-qty">
						<button type="button" class="minus">–</button>
						<input type="number" id="qtyValue" class="qty" name="quantity" value="1" min="1" max="<?php echo esc_attr( $product->get_stock_quantity() ); ?>" />
						<button type="button" class="plus">+</button>
					</div>
					<button type="submit" class="single_add_to_cart_button">Thêm vào giỏ hàng</button>
				</div>
			</form>
			
			<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>?add-to-cart=<?php echo esc_attr( $product->get_id() ); ?>" class="btn-buy-now">Mua ngay</a>

			<div id="accordionWrap">
				<?php
				if ( function_exists('get_field') ) {
					for ($i = 1; $i <= 5; $i++) {
						$f_title = get_field('feature_' . $i . '_title');
						$f_body = get_field('feature_' . $i . '_body');
						if ( $f_title ) {
							?>
							<div class="pg-accordion-item"><span><?php echo esc_html( $f_title ); ?></span><i class="bi bi-plus-lg"></i></div>
							<div class="pg-accordion-body"><?php echo wp_kses_post( nl2br($f_body) ); ?></div>
							<?php
						}
					}
				}
				
				// Nội dung mẫu nếu chưa nhập dữ liệu
				if ( !function_exists('get_field') || !get_field('feature_1_title') ) {
				?>
					<div class="pg-accordion-item"><span>Dịch thuật AI theo thời gian thực. Hơn 98 ngôn ngữ</span><i class="bi bi-plus-lg"></i></div>
					<div class="pg-accordion-body">Nói chuyện tự nhiên và xem phụ đề dịch ngay lập tức ngay trên mắt kính của bạn.</div>
					
					<div class="pg-accordion-item"><span>Trợ lý AI trên kính. Kích hoạt bằng giọng nói.</span><i class="bi bi-plus-lg"></i></div>
					<div class="pg-accordion-body">Tương tác dễ dàng với trợ lý ảo bằng giọng nói mọi lúc mọi nơi.</div>
				<?php } ?>
			</div>

			<div class="pg-app-downloads">
				<div>
					<h4>Ứng dụng có sẵn cho iOS và Android</h4>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/tai-ung-dung-va-huong-dan/' ) ); ?>" style="color: #666">App cho iOS</a></li>
						<li><a href="<?php echo esc_url( home_url( '/tai-ung-dung-va-huong-dan/' ) ); ?>" style="color: #666">App cho Android</a></li>
					</ul>
				</div>
				<i class="bi bi-x-lg" style="color: #ccc; cursor: pointer;"></i>
			</div>
		</div>
	</div>
</section>
