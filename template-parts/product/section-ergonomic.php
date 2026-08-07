<?php
/**
 * Template part for Ergonomic Design section
 */
global $product;

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
