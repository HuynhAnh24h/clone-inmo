<?php
/**
 * The main template file
 */

get_header();
?>

<div class="container py-5">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			if ( ! ( function_exists('is_account_page') && is_account_page() && ! is_user_logged_in() ) ) {
				the_title( '<h1 class="text-center mb-4">', '</h1>' );
			}
			the_content();
		endwhile;
	else :
		echo '<p>' . esc_html__( 'No content found', 'inmo-theme' ) . '</p>';
	endif;
	?>
</div>

<?php
get_footer();
