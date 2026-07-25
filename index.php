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
			the_title( '<h1>', '</h1>' );
			the_content();
		endwhile;
	else :
		echo '<p>' . esc_html__( 'No content found', 'inmo-theme' ) . '</p>';
	endif;
	?>
</div>

<?php
get_footer();
