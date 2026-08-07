<?php
/**
 * Template part for App section
 */
global $product;
?>
<section class="pg-app">
	<div class="pg-app__text">
		<h3><?php echo esc_html($product->get_name()); ?> APP</h3>
		<p class="pg-app__models">Dòng máy tương thích:</p>
		<ul class="pg-app__models" style="list-style: none; padding: 0">
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
					echo '<li><i class="bi bi-check2 me-1"></i>' . esc_html($m['model_name']) . '</li>';
				}
			} else {
				echo '<li><i class="bi bi-check2 me-1"></i>' . esc_html($product->get_name()) . '</li>';
			}
			?>
		</ul>
		<div class="mt-3">
			<?php 
			$ios_link = function_exists('get_field') && get_field('app_store_link') ? get_field('app_store_link') : home_url( '/tai-ung-dung-va-huong-dan/' );
			$android_link = function_exists('get_field') && get_field('google_play_link') ? get_field('google_play_link') : home_url( '/tai-ung-dung-va-huong-dan/' );
			
			$ios_target = (strpos($ios_link, 'http') === 0 && strpos($ios_link, home_url()) === false) ? ' target="_blank"' : '';
			$android_target = (strpos($android_link, 'http') === 0 && strpos($android_link, home_url()) === false) ? ' target="_blank"' : '';
			?>
			<a href="<?php echo esc_url( $ios_link ); ?>"<?php echo $ios_target; ?> class="btn-pg-dl"
				>Tải về cho iOS <i class="bi bi-arrow-right"></i
			></a>
			<a href="<?php echo esc_url( $android_link ); ?>"<?php echo $android_target; ?> class="btn-pg-dl"
				>Tải về cho Android <i class="bi bi-arrow-right"></i
			></a>
		</div>
	</div>
	<div class="pg-app__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/INMO_LOGO-Black.webp" alt="INMO Logo" style="max-width: 250px; opacity: 0.15;" /></div>
</section>
