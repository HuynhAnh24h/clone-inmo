<?php
/**
 * Template part for Testimonials section
 */
global $product;
?>
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
	<?php
	$feature_sm = array();
	$feature_lg1 = array();
	$feature_lg2 = array();
	$testimonials = array();

	if ( function_exists('get_field') ) {
		// Feature Sm
		for ( $k = 1; $k <= 5; $k++ ) {
			$img = get_field('feature_sm_' . $k . '_img');
			$title = get_field('feature_sm_' . $k . '_title');
			if ( $img || $title ) {
				$feature_sm[] = array('img' => $img, 'title' => $title);
			}
		}
		// Feature Lg 1
		for ( $k = 1; $k <= 3; $k++ ) {
			$img = get_field('feature_lg1_' . $k . '_img');
			$title = get_field('feature_lg1_' . $k . '_title');
			if ( $img || $title ) {
				$feature_lg1[] = array('img' => $img, 'title' => $title);
			}
		}
		// Feature Lg 2
		for ( $k = 1; $k <= 4; $k++ ) {
			$img = get_field('feature_lg2_' . $k . '_img');
			$title = get_field('feature_lg2_' . $k . '_title');
			if ( $img || $title ) {
				$feature_lg2[] = array('img' => $img, 'title' => $title);
			}
		}
		// Testimonials
		for ( $k = 1; $k <= 5; $k++ ) {
			$img = get_field('testi_' . $k . '_img');
			$name = get_field('testi_' . $k . '_name');
			$video = get_field('testi_' . $k . '_video');
			$quote = get_field('testi_' . $k . '_quote');
			if ( $img || $name || $video || $quote ) {
				$testimonials[] = array(
					'img' => $img,
					'name' => $name,
					'video_url' => $video,
					'quote' => $quote
				);
			}
		}
	}
	?>
	window.acfProductData = {
		featureSm: <?php echo json_encode(!empty($feature_sm) ? $feature_sm : null); ?>,
		featureLg1: <?php echo json_encode(!empty($feature_lg1) ? $feature_lg1 : null); ?>,
		featureLg2: <?php echo json_encode(!empty($feature_lg2) ? $feature_lg2 : null); ?>,
		testimonials: <?php echo json_encode(!empty($testimonials) ? $testimonials : null); ?>
	};
</script>
