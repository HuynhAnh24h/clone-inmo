<?php
/**
 * Template part for fixed scroll video section
 */
global $product;

// Lấy dữ liệu video scroll cố định và nội dung từ ACF
$scroll_video = function_exists('get_field') ? get_field('scroll_video') : '';

if ( $scroll_video ) : 
	$video_title    = get_field('scroll_video_title');
	$video_desc     = get_field('scroll_video_desc');
	$video_btn_text = get_field('scroll_video_btn_text');
	$video_btn_link = get_field('scroll_video_btn_link');
?>
	<!-- Section Video Scroll Cố định (Video làm nền, chữ trượt đè lên khi scroll) -->
	<section class="pg-scroll-video-section">
		<!-- Video nền cố định (sticky) -->
		<div class="pg-scroll-video-container">
			<video class="pg-scroll-video-bg" autoplay loop muted playsinline>
				<source src="<?php echo esc_url($scroll_video); ?>" type="video/mp4">
			</video>
		</div>
		
		<!-- Khoảng trống (100vh đầu tiên) để hiển thị video sạch không có chữ -->
		<div class="pg-scroll-video-spacer"></div>

		<!-- Section Thông tin hiển thị trượt đè lên video khi cuộn xuống (100vh tiếp theo) -->
		<?php if ( $video_title || $video_desc || ($video_btn_text && $video_btn_link) ) : ?>
			<div class="pg-scroll-video-info-overlay">
				<div class="container">
					<p class="pg-eyebrow"><?php echo esc_html($product->get_name()); ?></p>
					<?php if ( $video_title ) : ?>
						<h2 class="pg-scroll-video-info-title"><?php echo esc_html($video_title); ?></h2>
					<?php endif; ?>
					<?php if ( $video_desc ) : ?>
						<p class="pg-scroll-video-info-desc"><?php echo esc_html($video_desc); ?></p>
					<?php endif; ?>
					<?php if ( $video_btn_text && $video_btn_link ) : ?>
						<div class="mt-4">
							<a href="<?php echo esc_url($video_btn_link); ?>" class="btn-pg-cta">
								<?php echo esc_html($video_btn_text); ?> <i class="bi bi-arrow-right ms-1"></i>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</section>

<?php endif; ?>
