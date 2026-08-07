<?php
/**
 * Template part for Custom Showcase block (Kiểu 1 or Kiểu 2)
 */
global $product;

$layout_type = function_exists('get_field') ? get_field('custom_layout_type') : 'none';
if ( $layout_type && $layout_type !== 'none' ) :
	$layout_eyebrow = get_field('custom_layout_eyebrow');
	$layout_title   = get_field('custom_layout_title');
	$layout_desc    = get_field('custom_layout_desc');
	$layout_btn_txt = get_field('custom_layout_btn_text');
	$layout_btn_lnk = get_field('custom_layout_btn_link');
	$layout_img1    = get_field('custom_layout_img_1');
	$layout_img2    = get_field('custom_layout_img_2');
	$layout_prod_id = get_field('custom_layout_product');
?>
	<section class="pg-custom-showcase-section style-<?php echo esc_attr($layout_type); ?>">
		<div class="container-fluid px-3 px-md-5">
			<?php if ( $layout_type === 'style1' ) : ?>
				<!-- Kiểu 1: Bố cục Bundle (Gói sản phẩm) -->
				<div class="row align-items-center g-5">
					<div class="col-lg-5 col-12 pg-custom-left">
						<?php if ( $layout_eyebrow ) : ?>
							<span class="pg-showcase-eyebrow"><?php echo esc_html($layout_eyebrow); ?></span>
						<?php endif; ?>
						<?php if ( $layout_title ) : ?>
							<h2 class="pg-showcase-title"><?php echo esc_html($layout_title); ?></h2>
						<?php endif; ?>
						<?php if ( $layout_desc ) : ?>
							<p class="pg-showcase-desc"><?php echo esc_html($layout_desc); ?></p>
						<?php endif; ?>
						<?php if ( $layout_btn_txt && $layout_btn_lnk ) : ?>
							<div class="mt-4">
								<a href="<?php echo esc_url($layout_btn_lnk); ?>" class="btn-pg-cta style1-btn">
									<?php echo esc_html($layout_btn_txt); ?> <i class="bi bi-arrow-right ms-1"></i>
								</a>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-lg-7 col-12 pg-custom-right position-relative">
						<div class="pg-bundle-grid">
							<?php if ( $layout_img1 ) : ?>
								<div class="pg-bundle-img-col">
									<img src="<?php echo esc_url($layout_img1); ?>" alt="Bundle Image 1" class="img-fluid rounded-4 shadow-sm">
								</div>
							<?php endif; ?>
							<?php if ( $layout_img2 ) : ?>
								<div class="pg-bundle-img-col">
									<img src="<?php echo esc_url($layout_img2); ?>" alt="Bundle Image 2" class="img-fluid rounded-4 shadow-sm">
								</div>
							<?php endif; ?>
						</div>
						
						<!-- Floating Product Card (Thẻ mua nhanh nổi) -->
						<?php 
						if ( $layout_prod_id ) {
							$assoc_product = wc_get_product($layout_prod_id);
							if ( $assoc_product ) {
								$prod_title = $assoc_product->get_name();
								$prod_price = $assoc_product->get_price_html();
								$prod_thumb = wp_get_attachment_image_url($assoc_product->get_image_id(), 'thumbnail');
								$add_to_cart_url = esc_url(wc_get_checkout_url() . '?add-to-cart=' . $layout_prod_id);
								?>
								<div class="pg-floating-product-card shadow-lg">
									<?php if ( $prod_thumb ) : ?>
										<div class="card-thumb">
											<img src="<?php echo esc_url($prod_thumb); ?>" alt="<?php echo esc_attr($prod_title); ?>">
										</div>
									<?php endif; ?>
									<div class="card-details">
										<h4 class="card-title"><?php echo esc_html($prod_title); ?></h4>
										<span class="card-price"><?php echo $prod_price; ?></span>
									</div>
									<div class="card-action">
										<a href="<?php echo $add_to_cart_url; ?>" class="btn-card-buy">Buy Now</a>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			<?php elseif ( $layout_type === 'style2' ) : ?>
				<!-- Kiểu 2: Bố cục Đặc tính nổi bật (Showcase) -->
				<div class="row align-items-center g-5">
					<div class="col-lg-6 col-12 pg-custom-right">
						<div class="pg-showcase-single-img-wrap position-relative">
							<?php if ( $layout_img1 ) : ?>
								<img src="<?php echo esc_url($layout_img1); ?>" alt="Showcase Image" class="img-fluid rounded-4 shadow-lg pg-glow-img">
							<?php endif; ?>
							
							<!-- Sub card spec overlay -->
							<div class="pg-spec-overlay-card">
								<div class="d-flex align-items-center gap-2">
									<i class="bi bi-cpu text-success fs-4"></i>
									<div>
										<strong class="d-block text-white">Advanced AI Chip</strong>
										<small class="text-white-50">Real-time processing</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12 pg-custom-left">
						<?php if ( $layout_eyebrow ) : ?>
							<span class="pg-showcase-eyebrow text-success"><?php echo esc_html($layout_eyebrow); ?></span>
						<?php endif; ?>
						<?php if ( $layout_title ) : ?>
							<h2 class="pg-showcase-title text-white"><?php echo esc_html($layout_title); ?></h2>
						<?php endif; ?>
						<?php if ( $layout_desc ) : ?>
							<p class="pg-showcase-desc text-white-50"><?php echo esc_html($layout_desc); ?></p>
						<?php endif; ?>
						
						<div class="row g-3 mt-3 text-white">
							<div class="col-6">
								<div class="pg-spec-item d-flex gap-2">
									<i class="bi bi-battery-charging text-success"></i>
									<span>All-day Battery</span>
								</div>
							</div>
							<div class="col-6">
								<div class="pg-spec-item d-flex gap-2">
									<i class="bi bi-feather text-success"></i>
									<span>Lightweight (79g)</span>
								</div>
							</div>
							<div class="col-6">
								<div class="pg-spec-item d-flex gap-2">
									<i class="bi bi-speaker text-success"></i>
									<span>Stereo Speakers</span>
								</div>
							</div>
							<div class="col-6">
								<div class="pg-spec-item d-flex gap-2">
									<i class="bi bi-translate text-success"></i>
									<span>98 Languages</span>
								</div>
							</div>
						</div>
						
						<?php if ( $layout_btn_txt && $layout_btn_lnk ) : ?>
							<div class="mt-5">
								<a href="<?php echo esc_url($layout_btn_lnk); ?>" class="btn-pg-cta style2-btn">
									<?php echo esc_html($layout_btn_txt); ?> <i class="bi bi-arrow-right ms-1"></i>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
