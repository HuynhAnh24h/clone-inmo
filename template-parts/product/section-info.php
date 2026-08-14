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
				<?php
				$custom_gallery = function_exists('get_field') ? get_field('product_gallery') : null;
				
				// Initialize list of items
				$gallery_items = array();
				
				if ( !empty($custom_gallery) && is_array($custom_gallery) ) {
					// Use ACF gallery
					foreach ( $custom_gallery as $row ) {
						if ( $row['media_type'] === 'video' && !empty($row['video']) ) {
							$gallery_items[] = array(
								'type'      => 'video',
								'src'       => $row['video'],
								'thumb'     => !empty($row['video_thumbnail']) ? $row['video_thumbnail'] : wc_placeholder_img_src(),
							);
						} elseif ( $row['media_type'] === 'image' && !empty($row['image']) ) {
							$gallery_items[] = array(
								'type'      => 'image',
								'src'       => $row['image'],
								'thumb'     => $row['image'],
							);
						}
					}
				} else {
					// Fallback to standard WooCommerce Gallery
					$main_image_id  = $product->get_image_id();
					$main_image_url = $main_image_id ? wp_get_attachment_url( $main_image_id ) : wc_placeholder_img_src();
					$attachment_ids = $product->get_gallery_image_ids();
					
					if ( $main_image_url ) {
						$gallery_items[] = array(
							'type'  => 'image',
							'src'   => $main_image_url,
							'thumb' => $main_image_url,
						);
					}
					if ( $attachment_ids ) {
						foreach ( $attachment_ids as $attachment_id ) {
							$image_url = wp_get_attachment_url( $attachment_id );
							if ( $image_url ) {
								$gallery_items[] = array(
									'type'  => 'image',
									'src'   => $image_url,
									'thumb' => $image_url,
								);
							}
						}
					}
				}
				
				// Setup first item values
				$first_item = !empty($gallery_items) ? $gallery_items[0] : array('type' => 'image', 'src' => wc_placeholder_img_src(), 'thumb' => wc_placeholder_img_src());
				?>
				
				<!-- Thumbnails wrapper with scroll arrows -->
				<div class="pg-thumbs-wrapper">
					<div class="pg-thumb-arrow pg-thumb-arrow-up" id="thumbArrowUp"><i class="bi bi-chevron-up"></i></div>
					
					<div class="pg-thumbs" id="thumbsWrap">
						<?php foreach ( $gallery_items as $index => $item ) : ?>
							<img class="<?php echo $index === 0 ? 'is-active' : ''; ?>" 
							     src="<?php echo esc_url( $item['thumb'] ); ?>" 
							     data-type="<?php echo esc_attr( $item['type'] ); ?>" 
							     data-src="<?php echo esc_url( $item['src'] ); ?>" 
							     width="80" height="80"
							     loading="lazy"
							     alt="<?php echo esc_attr( $product->get_name() . ' gallery thumbnail ' . ($index + 1) ); ?>" />
						<?php endforeach; ?>
					</div>
					
					<div class="pg-thumb-arrow pg-thumb-arrow-down" id="thumbArrowDown"><i class="bi bi-chevron-down"></i></div>
				</div>
				
				<!-- Main preview container with gallery nav arrows -->
				<div class="pg-main-img" id="mainMediaContainer" style="position: relative; cursor: zoom-in;">
					<div class="pg-gallery-arrow pg-gallery-prev" id="galleryPrevBtn"><i class="bi bi-chevron-left"></i></div>
					<div class="pg-gallery-arrow pg-gallery-next" id="galleryNextBtn"><i class="bi bi-chevron-right"></i></div>
					
					<img id="mainImage" 
					     src="<?php echo $first_item['type'] === 'image' ? esc_url( $first_item['src'] ) : ''; ?>" 
					     alt="<?php the_title_attribute(); ?>" 
					     width="600" height="520"
					     style="width: 100%; height: 100%; object-fit: contain; display: <?php echo $first_item['type'] === 'image' ? 'block' : 'none'; ?>;" />
					
					<video id="mainVideo" 
					       autoplay loop muted playsinline 
					       src="<?php echo $first_item['type'] === 'video' ? esc_url( $first_item['src'] ) : ''; ?>" 
					       style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px; display: <?php echo $first_item['type'] === 'video' ? 'block' : 'none'; ?>;"></video>
				</div>
			</div>
		</div>

		<div class="col-lg-5">
			<h1 class="pg-info__title"><?php the_title(); ?></h1>
			<div class="pg-info__price"><?php echo $product->get_price_html(); ?></div>
			<?php 
			$show_note1 = function_exists('get_field') && get_field('show_custom_note_1') !== null ? get_field('show_custom_note_1') : true;
			if ( $show_note1 ) {
				$note1 = function_exists('get_field') && get_field('custom_note_1') ? get_field('custom_note_1') : 'Người ủng hộ Kickstarter được ưu tiên giao hàng.';
				if ( $note1 ) {
					echo '<div class="pg-top-note">' . wp_kses_post( $note1 ) . '</div>';
				}
			}
			?>

			<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
				<div class="pg-cart-wrap">
					<div class="pg-qty">
						<button type="button" class="minus">–</button>
						<input type="number" id="qtyValue" class="qty" name="quantity" value="1" min="1" max="<?php echo esc_attr( $product->get_stock_quantity() ); ?>" />
						<button type="button" class="plus">+</button>
					</div>
					<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt">Thêm vào giỏ hàng</button>
				</div>
			</form>
			
			<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>?add-to-cart=<?php echo esc_attr( $product->get_id() ); ?>" class="btn-buy-now">Mua ngay</a>

			<?php
			$show_accordion = function_exists('get_field') && get_field('show_accordion') !== null ? get_field('show_accordion') : true;
			if ( $show_accordion ) :
			?>
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
			<?php endif; ?>

			<?php
			$show_app = function_exists('get_field') && get_field('show_app_downloads') !== null ? get_field('show_app_downloads') : true;
			if ( $show_app ) :
				$app_title = function_exists('get_field') && get_field('app_downloads_title') ? get_field('app_downloads_title') : 'Ứng dụng có sẵn cho iOS và Android';
				$ios_link = function_exists('get_field') && get_field('app_ios_link') ? get_field('app_ios_link') : '/tai-ung-dung-va-huong-dan/';
				$android_link = function_exists('get_field') && get_field('app_android_link') ? get_field('app_android_link') : '/tai-ung-dung-va-huong-dan/';
				
				$ios_url = ( strpos($ios_link, 'http') === 0 ) ? $ios_link : home_url($ios_link);
				$android_url = ( strpos($android_link, 'http') === 0 ) ? $android_link : home_url($android_link);
			?>
			<div class="pg-app-downloads">
				<div>
					<h4><?php echo esc_html( $app_title ); ?></h4>
					<ul>
						<li><a href="<?php echo esc_url( $ios_url ); ?>" style="color: #666">App cho iOS</a></li>
						<li><a href="<?php echo esc_url( $android_url ); ?>" style="color: #666">App cho Android</a></li>
					</ul>
				</div>
				<i class="bi bi-x-lg" style="color: #ccc; cursor: pointer;"></i>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Gallery Lightbox Modal -->
<div id="pgLightbox" class="pg-lightbox">
	<span class="pg-lightbox-close" id="lightboxClose">&times;</span>
	<div class="pg-lightbox-content">
		<img id="lightboxImg" src="" alt="Lightbox zoom view" />
		<video id="lightboxVideo" autoplay loop muted playsinline controls style="display: none; width: 100%; max-height: 85vh; border-radius: 8px;"></video>
	</div>
	<div class="pg-lightbox-arrow pg-lightbox-prev" id="lightboxPrev"><i class="bi bi-chevron-left"></i></div>
	<div class="pg-lightbox-arrow pg-lightbox-next" id="lightboxNext"><i class="bi bi-chevron-right"></i></div>
</div>
