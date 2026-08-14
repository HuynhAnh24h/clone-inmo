<?php
/**
 * The template for displaying all single posts (Blog Details)
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	$banner_img = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
	$categories = get_the_category();
	?>

	<!-- Single Post Hero Banner -->
	<section class="pg-post-hero" style="<?php echo $banner_img ? "background-image: url('" . esc_url($banner_img) . "');" : 'background-color: #111;'; ?>">
		<div class="pg-post-hero-overlay"></div>
		<div class="container pg-post-hero-content text-center">
			<div class="pg-post-meta-top mb-3">
				<?php if ( !empty($categories) ) : ?>
					<span class="pg-post-cat"><?php echo esc_html( $categories[0]->name ); ?></span>
					<span class="sep">•</span>
				<?php endif; ?>
				<span class="pg-post-date"><?php echo get_the_date('M d, Y'); ?></span>
			</div>
			<h1 class="pg-post-title"><?php the_title(); ?></h1>
		</div>
	</section>

	<!-- Single Post Body Content -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('pg-post-article py-5'); ?>>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10 pg-post-content-wrap">
					
					<div class="pg-post-entry-content">
						<?php the_content(); ?>
					</div>
					
					<!-- Share Links -->
					<div class="pg-post-footer border-top pt-4 mt-5 d-flex justify-content-between align-items-center flex-wrap gap-3">
						<div class="pg-post-share d-flex align-items-center gap-3">
							<span class="share-label fw-bold">Chia sẻ:</span>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn text-dark"><i class="bi bi-facebook"></i></a>
							<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-btn text-dark"><i class="bi bi-twitter-x"></i></a>
							<a href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" class="share-btn text-dark"><i class="bi bi-envelope-fill"></i></a>
						</div>
					</div>
					
					<!-- Next / Prev Post Links -->
					<div class="pg-post-nav row border-top pt-4 mt-4">
						<div class="col-6 text-start">
							<?php
							$prev_post = get_previous_post();
							if ( $prev_post ) :
								?>
								<span class="nav-label text-muted d-block small">Bài trước</span>
								<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="nav-link text-decoration-none fw-bold text-dark text-truncate d-block">
									<i class="bi bi-arrow-left me-1"></i> <?php echo esc_html( $prev_post->post_title ); ?>
								</a>
							<?php endif; ?>
						</div>
						<div class="col-6 text-end">
							<?php
							$next_post = get_next_post();
							if ( $next_post ) :
								?>
								<span class="nav-label text-muted d-block small">Bài tiếp theo</span>
								<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="nav-link text-decoration-none fw-bold text-dark text-truncate d-block">
									<?php echo esc_html( $next_post->post_title ); ?> <i class="bi bi-arrow-right ms-1"></i>
								</a>
							<?php endif; ?>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</article>

	<?php
endwhile;

get_footer();
