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
	<style>
		.pg-product { padding: 40px 0; font-family: 'Inter', sans-serif; }
		.pg-gallery { display: flex; gap: 20px; }
		.pg-thumbs { display: flex; flex-direction: column; gap: 15px; width: 80px; }
		.pg-thumbs img { width: 80px; height: 80px; object-fit: contain; background: #000; border-radius: 8px; cursor: pointer; border: 2px solid transparent; transition: all 0.2s; padding: 5px; }
		.pg-thumbs img:hover, .pg-thumbs img.is-active { border-color: #000; opacity: 0.8; }
		.pg-main-image { flex: 1; text-align: center; }
		.pg-main-image img { width: 100%; max-width: 600px; height: auto; object-fit: contain; }
		
		.pg-info__title { font-size: 2rem; font-weight: 700; margin-bottom: 10px; }
		.pg-info__price { font-size: 1.2rem; font-weight: 600; margin-bottom: 20px; }
		.pg-top-note { font-size: 0.9rem; color: #555; margin-bottom: 20px; }
		
		.pg-cart-wrap { display: flex; align-items: center; gap: 20px; margin-bottom: 10px; }
		.pg-qty { display: flex; align-items: center; border: 1px solid #eaeaea; border-radius: 30px; padding: 5px 15px; background: #fff; }
		.pg-qty button { border: none; background: transparent; font-size: 1.2rem; cursor: pointer; color: #333; }
		.pg-qty input { width: 40px; text-align: center; border: none; background: transparent; font-weight: 600; outline: none; }
		
		.single_add_to_cart_button { flex: 1; padding: 15px; background: #1c1d21; color: #fff; border: none; border-radius: 30px; font-weight: 600; transition: background 0.2s; cursor: pointer; text-align: center; }
		.single_add_to_cart_button:hover { background: #000; color: #fff; }
		
		.btn-buy-now { display: block; width: 100%; padding: 15px; background: #fff; color: #000; border: 1px solid #1c1d21; border-radius: 30px; font-weight: 600; text-align: center; text-decoration: none; margin-bottom: 30px; transition: background 0.2s; }
		.btn-buy-now:hover { background: #f8f8f8; color: #000; }
		
		.pg-accordion-item { padding: 18px 20px; background: #fafafa; border-radius: 8px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 500; color: #333; margin-bottom: 10px; transition: background 0.2s; }
		.pg-accordion-item:hover { background: #f1f1f1; }
		.pg-accordion-body { display: none; padding: 0 20px 20px; color: #666; font-size: 0.95rem; }
		
		.pg-app-downloads { background: #fafafa; padding: 20px; border-radius: 8px; margin-top: 20px; display: flex; justify-content: space-between; align-items: flex-start; }
		.pg-app-downloads h4 { font-size: 0.95rem; margin-bottom: 10px; font-weight: 600; }
		.pg-app-downloads ul { margin: 0; padding-left: 20px; font-size: 0.9rem; color: #666; }
		#testiWrap::-webkit-scrollbar { display: none; }
		#testiWrap { -ms-overflow-style: none; scrollbar-width: none; cursor: grab; }
		#testiWrap:active { cursor: grabbing; }

		/* Parallax Banner CSS */
		.pg-parallax-banner {
			position: relative;
			min-height: 100vh;
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
			display: flex;
			align-items: center;
			justify-content: center;
			margin: 0;
		}
		@media (max-width: 768px) {
			.pg-parallax-banner {
				/* Tối ưu Mobile: tắt cố định nền để mượt hơn, hoặc vẫn để nếu trình duyệt hỗ trợ tốt */
				background-attachment: scroll;
				min-height: 70vh;
			}
		}
		.pg-parallax-content {
			text-align: center;
			color: #fff;
			background: rgba(0, 0, 0, 0.3);
			padding: 40px 60px;
			border-radius: 20px;
			backdrop-filter: blur(8px);
			-webkit-backdrop-filter: blur(8px);
		}
		.pg-parallax-content .pg-eyebrow {
			color: #fff;
			font-size: 1.5rem;
			letter-spacing: 2px;
			margin-bottom: 20px;
		}
		.pg-parallax-content .btn-pg-cta {
			background: #fff;
			color: #000;
			border: none;
			padding: 15px 40px;
			border-radius: 40px;
			font-weight: 600;
			font-size: 1.2rem;
			cursor: pointer;
			transition: transform 0.3s;
		}
		.pg-parallax-content .btn-pg-cta:hover {
			transform: scale(1.05);
		}
	</style>
	<section class="pg-product animate-fade-in">
		<div class="container-fluid px-3 px-md-5">
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
					<div class="pg-cart-wrap">
						<div class="pg-qty">
							<button type="button" class="minus">–</button>
							<input type="number" id="qtyValue" class="qty" name="quantity" value="1" min="1" max="<?php echo esc_attr( $product->get_stock_quantity() ); ?>" />
							<button type="button" class="plus">+</button>
						</div>
						<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button">Thêm vào giỏ hàng</button>
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

	<!-- ================= PARALLAX BANNER ================= -->
	<?php $banner = function_exists('get_field') ? get_field('product_banner_image') : ''; ?>
	<?php if( $banner ): ?>
	<div class="pg-parallax-banner" style="background-image: url('<?php echo esc_url($banner); ?>');">
		<div class="pg-parallax-content">
			<p class="pg-eyebrow"><?php echo esc_html($product->get_name()); ?></p>
			<button type="button" class="btn-pg-cta">
				Xem Cách Hoạt Động <i class="bi bi-arrow-right ms-1"></i>
			</button>
		</div>
	</div>
	<?php endif; ?>

	<!-- ================= ERGONOMIC DESIGN (dark) ================= -->
	<?php 
		$erg_head = function_exists('get_field') && get_field('ergonomic_heading') ? get_field('ergonomic_heading') : 'Ergonomic Design for All-Day Comfort';
		$erg_sub = function_exists('get_field') && get_field('ergonomic_subheading') ? get_field('ergonomic_subheading') : 'Precision crafted for lightweight performance';
	?>
	<section class="pg-dark-section">
		<div class="container">
			<p class="pg-eyebrow"><?php echo esc_html($product->get_name()); ?></p>
			<h2 class="pg-dark-heading"><?php echo esc_html($erg_head); ?></h2>
			<p class="pg-dark-sub"><?php echo esc_html($erg_sub); ?></p>

			<div class="row g-3 mb-3" id="featureSmWrap"></div>
			<div class="row g-3 mb-3" id="featureLgWrap1"></div>
			<div class="row g-3" id="featureLgWrap2"></div>
		</div>
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
				<a href="<?php echo esc_url( home_url( '/tai-ung-dung-va-huong-dan/' ) ); ?>" class="btn-pg-dl"
					>Tải về cho iOS <i class="bi bi-arrow-right"></i
				></a>
				<a href="<?php echo esc_url( home_url( '/tai-ung-dung-va-huong-dan/' ) ); ?>" class="btn-pg-dl"
					>Tải về cho Android <i class="bi bi-arrow-right"></i
				></a>
			</div>
		</div>
		<div class="pg-app__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/INMO_LOGO-Black.webp" alt="INMO Logo" style="max-width: 250px; opacity: 0.15;" /></div>
	</section>

	<!-- ================= TESTIMONIALS ================= -->
	<section class="pg-testimonials">
		<div class="container">
			<h2 class="pg-dark-heading">Đánh Giá Từ Chuyên Gia</h2>
			<p class="pg-dark-sub">Thiết Kế Tinh Xảo - Hiệu Năng Vượt Trội</p>
		</div>
		<div class="container-fluid px-0">
			<div class="row g-3 mx-0 flex-nowrap" id="testiWrap" style="overflow-x: auto; padding-bottom: 20px;"></div>
		</div>
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
