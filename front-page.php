<?php
/**
 * The front page template file
 */

get_header();

// Lấy dữ liệu từ ACF (Nếu chưa nhập sẽ lấy giá trị mặc định)
$hero_title = get_field('hero_title') ?: 'INMO GO3';
$hero_bg = get_field('hero_bg_image') ?: get_template_directory_uri() . '/assets/images/inmo-go3-desktop-banner_img_pc (1).webp';
$discount_title = get_field('discount_title') ?: 'Giảm ngay 100 USD cho Kính AI GO3';
$about_title = get_field('about_title') ?: 'INMOXR';
$about_desc = get_field('about_desc') ?: 'INMO tập trung vào nghiên cứu và phát triển kính thông minh, là đơn vị tiên phong trong lĩnh vực kính AR không dây và kính thông minh tích hợp AI, đồng thời là doanh nghiệp hàng đầu trong ngành hàng kính thông minh toàn cầu.';
$about_bg = get_field('about_bg_image') ?: get_template_directory_uri() . '/assets/images/home-about-section.webp';

$slidesData = [
    [ 'videoId' => "jNQXAC9IVRw", 'title' => "Sẵn sàng cho công việc" ],
    [ 'videoId' => "2Vv-BfVoq4g", 'title' => "Tối ưu quy trình" ],
    [ 'videoId' => "aqz-KE-bpKQ", 'title' => "Kết nối liền mạch" ]
];

$kolData = [
    [ 'image' => "https://placehold.co/400x380/8b7fc7/ffffff?text=VR+Review", 'caption' => "Đánh giá từ chuyên gia Mr.VR" ],
    [ 'image' => "https://placehold.co/400x380/1a1a2e/ffffff?text=Iron+Man+AR", 'caption' => "Đánh giá từ @Brains techKnowlogy" ],
    [ 'image' => "https://placehold.co/400x380/c9b79c/ffffff?text=XR+Glasses", 'caption' => "Đánh giá từ @Cas and Chary XR" ],
    [ 'image' => "https://placehold.co/400x380/4a4a4a/ffffff?text=Smart+Glasses", 'caption' => "Đánh giá từ @TechDaily" ],
    [ 'image' => "https://placehold.co/400x380/2d5f5f/ffffff?text=AR+Unboxing", 'caption' => "Đánh giá từ @GadgetVN" ]
];
?>
<script>
    window.inmoFrontSlidesData = <?php echo json_encode($slidesData); ?>;
    window.inmoFrontKolData = <?php echo json_encode($kolData); ?>;
</script>

<!-- Hero Section -->
<section class="theme-hero-wrapper animate-fade-in" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
	<div class="container d-flex justify-content-start align-items-center">
	<div class="theme-hero-content">
		<h1 class="theme-hero-hight-light-text">
		Kính AI <?php echo esc_html($hero_title); ?> – Dùng hàng ngày
		</h1>
		<p class="theme-hero-text">
		Kính <span class="theme-hight-light">dịch thuật AI</span>
		</p>
		<p class="theme-hero-text">Dành cho</p>
		<p class="theme-hero-text mb-5">
		Nhu cầu sử dụng <span class="theme-hight-light">hàng ngày</span>
		</p>
		<button class="theme-primary-btn">
		Mua Ngay <i class="bi bi-chevron-right"></i>
		</button>
	</div>
	</div>
</section>
<!-- End Hero Section -->

<!-- Section Discount -->
<section class="theme-discount-wrapper py-5 animate-slide-up">
	<div class="container d-flex flex-column justify-content-center align-items-center py-5">
	<h2 class="theme-discount-text-heading">
		<?php echo esc_html($discount_title); ?>
	</h2>
	<p class="theme-discount-subtext">
		Nhận thông tin mới nhất từ ​​INMO.
	</p>
	<form class="theme-discount-form" onsubmit="return false;">
		<div class="theme-discount-email-pill d-flex align-items-center">
		<input type="email" class="theme-email-input" placeholder="Nhập email của bạn" required autocomplete="email" />
		<button type="submit" class="theme-discount-email-submit" aria-label="Gửi email">
			<i class="bi bi-arrow-right"></i>
		</button>
		</div>
	</form>
	</div>
</section>
<!-- Section Discount -->

<!-- Index Page  -->
<div class="container py-5 animate-fade-in">
	<h2 class="theme-title">Về INMO</h2>
</div>

<section class="theme-about-wrapper animate-fade-in" style="background-image: url('<?php echo esc_url($about_bg); ?>');">
	<div class="container py-5">
	<div class="col-md-6">
		<h2 class="theme-about-title"><?php echo esc_html($about_title); ?></h2>
		<p class="theme-about-text">
		<?php echo nl2br(esc_html($about_desc)); ?>
		</p>
		<button class="theme-about-btn">
		Tìm hiểu thêm <i class="bi bi-arrow-right"></i>
		</button>
	</div>
	</div>
</section>
<!-- End Index Page  -->

<div class="container py-5 animate-fade-in">
	<h2 class="theme-title">Tính năng đột phá</h2>
</div>

<div class="theme-slide-block animate-slide-up">
	<div class="splide" id="splide-innovative">
		<div class="splide__track">
			<ul class="splide__list">
				<?php foreach($slidesData as $slide): ?>
				<li class="splide__slide theme-slide-item" data-video-id="<?php echo esc_attr($slide['videoId']); ?>">
					<div class="theme-slide-item__media">
						<img src="https://img.youtube.com/vi/<?php echo esc_attr($slide['videoId']); ?>/hqdefault.jpg" alt="<?php echo esc_attr($slide['title']); ?>">
					</div>
					<div class="theme-slide-item__overlay"></div>
					<div class="theme-slide-item__content">
						<h3 class="theme-slide-item__title"><?php echo esc_html($slide['title']); ?></h3>
						<button type="button" class="theme-slide-item__cta">Xem thêm</button>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="splide__arrows theme-slide-nav">
			<button class="splide__arrow splide__arrow--prev theme-slide-nav__btn">
				<i class="bi bi-arrow-left"></i>
			</button>
			<button class="splide__arrow splide__arrow--next theme-slide-nav__btn">
				<i class="bi bi-arrow-right"></i>
			</button>
		</div>
	</div>
</div>

<div class="container py-5 animate-fade-in">
	<h2 class="theme-title">KOL Reality Labs</h2>
</div>
<section class="theme-kol-slide container animate-slide-up">
	<div class="splide" id="splide-kol">
		<div class="splide__track">
			<ul class="splide__list">
				<?php foreach($kolData as $kol): ?>
				<li class="splide__slide theme-kol-slide__item">
					<div class="theme-kol-slide__media">
						<img src="<?php echo esc_url($kol['image']); ?>" alt="<?php echo esc_attr($kol['caption']); ?>">
					</div>
					<div class="theme-kol-slide__caption"><?php echo esc_html($kol['caption']); ?></div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="splide__arrows theme-kol-slide__arrows">
			<button class="splide__arrow splide__arrow--prev theme-kol-slide__nav-btn theme-kol-slide__nav-btn--prev">
				<i class="bi bi-chevron-left"></i>
			</button>
			<button class="splide__arrow splide__arrow--next theme-kol-slide__nav-btn theme-kol-slide__nav-btn--next">
				<i class="bi bi-chevron-right"></i>
			</button>
		</div>
	</div>
</section>

<?php
get_footer();
