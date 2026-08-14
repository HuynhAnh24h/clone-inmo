<?php
/**
 * The template for displaying the blog posts index (Newsroom)
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<!-- Newsroom Header -->
<div class="pg-newsroom-header text-center py-5">
	<div class="container">
		<h1 class="pg-newsroom-title">Tin tức</h1>
	</div>
</div>

<!-- Blog Grid List -->
<div class="container pb-5">
	<div class="row g-4">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				$thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : wc_placeholder_img_src();
				$comments_count = get_comments_number();
				?>
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<article class="pg-blog-card">
						<a href="<?php the_permalink(); ?>" class="pg-blog-card-media">
							<img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php the_title_attribute(); ?>">
						</a>
						<div class="pg-blog-card-meta">
							<span class="meta-item"><i class="bi bi-calendar3"></i> <?php echo get_the_date('M d, Y'); ?></span>
							<span class="meta-item"><i class="bi bi-chat-left-text"></i> <?php echo sprintf( _n( '%s bình luận', '%s bình luận', $comments_count, 'inmo-theme' ), number_format_i18n( $comments_count ) ); ?></span>
						</div>
						<h3 class="pg-blog-card-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<p class="pg-blog-card-excerpt">
							<?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?>
						</p>
						<a href="<?php the_permalink(); ?>" class="pg-blog-card-link">Đọc thêm</a>
					</article>
				</div>
				<?php
			endwhile;
			
			// Pagination
			echo '<div class="col-12 mt-5 d-flex justify-content-center">';
			the_posts_pagination( array(
				'prev_text' => '<i class="bi bi-chevron-left"></i>',
				'next_text' => '<i class="bi bi-chevron-right"></i>',
				'class'     => 'pg-pagination',
			) );
			echo '</div>';
			
		else :
			echo '<div class="col-12 text-center py-5"><p>Chưa có bài viết nào.</p></div>';
		endif;
		?>
	</div>
</div>

<?php
get_footer();
