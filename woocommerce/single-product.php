<?php
/**
 * The Template for displaying all single products
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<?php global $product; ?>
	
	<!-- ================= PRODUCT ================= -->
	<section class="pg-product animate-fade-in">
		<div class="row g-5">
			<div class="col-lg-6">
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

			<div class="col-lg-6">
				<div class="d-flex justify-content-between align-items-start">
					<h1 class="pg-info__title"><?php the_title(); ?></h1>
					<div class="pg-info__price"><?php echo $product->get_price_html(); ?></div>
				</div>

				<div class="pg-info__desc">
					<?php the_excerpt(); ?>
				</div>
				
				<?php 
				$note1 = function_exists('get_field') ? get_field('custom_note_1') : '';
				$note2 = function_exists('get_field') ? get_field('custom_note_2') : '';
				if ( $note1 ) echo '<p class="pg-info__note">' . esc_html( $note1 ) . '</p>';
				if ( $note2 ) echo '<p class="pg-info__note">' . esc_html( $note2 ) . '</p>';
				?>

				<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
					<div class="pg-qty">
						<button type="button" class="minus">–</button>
						<input type="number" id="qtyValue" class="qty" name="quantity" value="1" min="1" max="<?php echo esc_attr( $product->get_stock_quantity() ); ?>" style="width: 40px; text-align: center; border: none; background: transparent; font-weight: 600;" />
						<button type="button" class="plus">+</button>
					</div>

					<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn-pg-primary single_add_to_cart_button button alt">Thêm vào giỏ hàng</button>
				</form>

				<div id="accordionWrap">
					<?php
					$features = function_exists('get_field') ? get_field('product_features') : false;
					if ( is_array( $features ) && !empty($features) ) {
						foreach ( $features as $feature ) {
							?>
							<div class="pg-accordion-item"><span><?php echo esc_html( $feature['title'] ); ?></span><i class="bi bi-plus-lg"></i></div>
							<div class="pg-accordion-body"><?php echo wp_kses_post( $feature['body'] ); ?></div>
							<?php
						}
					} else {
					?>
						<div class="pg-accordion-item"><span>Dịch Thuật AI Theo Thời Gian Thực</span><i class="bi bi-plus-lg"></i></div>
						<div class="pg-accordion-body">Nói chuyện tự nhiên và xem phụ đề dịch ngay lập tức.</div>
					<?php
					}
					?>
				</div>

				<div class="pg-share">
					Chia sẻ:
					<a href="#"><i class="bi bi-facebook"></i></a>
					<a href="#"><i class="bi bi-twitter-x"></i></a>
					<a href="#"><i class="bi bi-telegram"></i></a>
					<a href="#"><i class="bi bi-whatsapp"></i></a>
					<a href="#"><i class="bi bi-envelope"></i></a>
				</div>

				<div class="pg-policy">
					<?php echo get_post_meta( get_the_ID(), 'shipping_policy', true ) ?: 'Chi tiết chính sách giao hàng...'; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ================= FULL IMAGE BANNER ================= -->
	<?php $banner = function_exists('get_field') ? get_field('product_banner_image') : ''; ?>
	<?php if( $banner ): ?>
	<div class="pg-banner">
		<img src="<?php echo esc_url($banner); ?>" alt="Banner" />
	</div>
	<?php endif; ?>

	<!-- ================= HOW IT WORKS ================= -->
	<div class="pg-howitworks">
		<p class="pg-eyebrow">INMO GO3</p>
		<button type="button" class="btn-pg-cta">
			Xem Cách Hoạt Động <i class="bi bi-arrow-right ms-1"></i>
		</button>
	</div>

	<!-- ================= ERGONOMIC DESIGN (dark) ================= -->
	<?php 
		$erg_head = function_exists('get_field') && get_field('ergonomic_heading') ? get_field('ergonomic_heading') : 'Ergonomic Design for All-Day Comfort';
		$erg_sub = function_exists('get_field') && get_field('ergonomic_subheading') ? get_field('ergonomic_subheading') : 'Precision crafted for lightweight performance';
	?>
	<section class="pg-dark-section">
		<p class="pg-eyebrow"><?php echo esc_html($product->get_name()); ?></p>
		<h2 class="pg-dark-heading"><?php echo esc_html($erg_head); ?></h2>
		<p class="pg-dark-sub"><?php echo esc_html($erg_sub); ?></p>

		<div class="row g-3 mb-3" id="featureSmWrap"></div>
		<div class="row g-3 mb-3" id="featureLgWrap1"></div>
		<div class="row g-3" id="featureLgWrap2"></div>
	</section>

	<!-- ================= READY CTA ================= -->
	<div class="pg-dark-section pg-ready" style="padding-top: 0">
		<h2>Bạn Đã Sẵn Sàng Trải Nghiệm INMO GO3?</h2>
		<button type="button" class="btn-pg-cta">
			Mua Ngay <i class="bi bi-arrow-right ms-1"></i>
		</button>
	</div>

	<!-- ================= APP SECTION ================= -->
	<section class="pg-app">
		<div class="pg-app__text">
			<h3><?php echo esc_html($product->get_name()); ?> APP</h3>
			<p class="pg-app__models">Dòng máy tương thích:</p>
			<ul class="pg-app__models" style="list-style: none; padding: 0">
				<?php 
				$models = function_exists('get_field') ? get_field('compatible_models') : false;
				if( $models ) {
					foreach( $models as $m ) {
						echo '<li><i class="bi bi-check2 me-1"></i>' . esc_html($m['model_name']) . '</li>';
					}
				} else {
					echo '<li><i class="bi bi-check2 me-1"></i>' . esc_html($product->get_name()) . '</li>';
				}
				?>
			</ul>
			<div class="mt-3">
				<a href="#" class="btn-pg-dl"
					>Tải về cho iOS <i class="bi bi-arrow-right"></i
				></a>
				<a href="#" class="btn-pg-dl"
					>Tải về cho Android <i class="bi bi-arrow-right"></i
				></a>
			</div>
		</div>
		<div class="pg-app__logo"><span>INMO</span></div>
	</section>

	<!-- ================= TESTIMONIALS ================= -->
	<section class="pg-testimonials">
		<h2 class="pg-dark-heading">Đánh Giá Từ Chuyên Gia</h2>
		<p class="pg-dark-sub">Thiết Kế Tinh Xảo - Hiệu Năng Vượt Trội</p>
		<div class="row g-3" id="testiWrap"></div>
	</section>

	<script>
		window.acfProductData = {
			featureSm: <?php echo json_encode(function_exists('get_field') ? get_field('feature_sm_data') : null); ?>,
			featureLg1: <?php echo json_encode(function_exists('get_field') ? get_field('feature_lg_data_1') : null); ?>,
			featureLg2: <?php echo json_encode(function_exists('get_field') ? get_field('feature_lg_data_2') : null); ?>,
			testimonials: <?php echo json_encode(function_exists('get_field') ? get_field('testimonials') : null); ?>
		};
	</script>
<?php endwhile; // end of the loop. ?>



<?php
get_footer( 'shop' );
