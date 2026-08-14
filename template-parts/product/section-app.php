<?php
/**
 * Template part for App section (Premium Redesign)
 */
global $product;

$show_app = function_exists('get_field') && get_field('show_app') !== null ? get_field('show_app') : true;
if ( ! $show_app ) return;

$app_logo_url = function_exists('get_field') && get_field('app_section_logo') ? get_field('app_section_logo') : '';
if ( empty($app_logo_url) ) {
	// Fallback placeholder image or theme icon
	$app_logo_url = get_template_directory_uri() . '/assets/images/INMO_LOGO-Black.webp';
}

$ios_link = function_exists('get_field') && get_field('app_store_link') ? get_field('app_store_link') : home_url( '/tai-ung-dung-va-huong-dan/' );
$android_link = function_exists('get_field') && get_field('google_play_link') ? get_field('google_play_link') : home_url( '/tai-ung-dung-va-huong-dan/' );

$ios_target = (strpos($ios_link, 'http') === 0 && strpos($ios_link, home_url()) === false) ? ' target="_blank"' : '';
$android_target = (strpos($android_link, 'http') === 0 && strpos($android_link, home_url()) === false) ? ' target="_blank"' : '';
?>
<section class="pg-app">
	<div class="container pg-app-inner-wrap">
		<div class="row align-items-center g-5">
			<div class="col-lg-6 col-12 pg-app__text">
				<h3><?php echo esc_html($product->get_name()); ?> APP</h3>
				<p class="pg-app__models-label">Compatible models:</p>
				<ul class="pg-app__models">
					<?php 
					$models = array();
					if ( function_exists('get_field') ) {
						for ( $k = 1; $k <= 5; $k++ ) {
							$m_name = get_field('compatible_model_' . $k);
							if ( $m_name ) {
								$models[] = array('model_name' => $m_name);
							}
						}
					}
					if( !empty($models) ) {
						foreach( $models as $m ) {
							echo '<li>' . esc_html($m['model_name']) . '</li>';
						}
					} else {
						echo '<li>' . esc_html($product->get_name()) . '</li>';
					}
					?>
				</ul>
				<div class="pg-app-buttons mt-4">
					<a href="<?php echo esc_url( $ios_link ); ?>"<?php echo $ios_target; ?> class="btn-pg-dl">
						Download for iOS <i class="bi bi-arrow-right"></i>
					</a>
					<a href="<?php echo esc_url( $android_link ); ?>"<?php echo $android_target; ?> class="btn-pg-dl">
						Download for Android <i class="bi bi-arrow-right"></i>
					</a>
				</div>
			</div>
			<div class="col-lg-6 col-12 pg-app__logo">
				<img src="<?php echo esc_url($app_logo_url); ?>" width="440" height="440" loading="lazy" alt="<?php echo esc_attr($product->get_name()); ?> App Icon" />
			</div>
		</div>
	</div>
</section>
