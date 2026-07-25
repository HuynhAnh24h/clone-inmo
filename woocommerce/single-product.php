<?php
/**
 * The Template for displaying all single products
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<?php global $product; ?>
	
	<!-- ================= PRODUCT ================= -->
	<section class="pg-product animate-fade-in">
		<div class="row g-5">
			<div class="col-lg-6">
				<div class="pg-gallery">
					<div class="pg-thumbs" id="thumbsWrap">
						<?php
						$attachment_ids = $product->get_gallery_image_ids();
						$main_image_url = wp_get_attachment_image_url( $product->get_image_id(), 'full' );
						
						if ( $product->get_image_id() ) {
							echo '<img src="' . esc_url( wp_get_attachment_image_url( $product->get_image_id(), 'thumbnail' ) ) . '" class="is-active" data-full="' . esc_url( $main_image_url ) . '" alt="">';
						}
						
						if ( $attachment_ids && $product->get_image_id() ) {
							foreach ( $attachment_ids as $attachment_id ) {
								echo '<img src="' . esc_url( wp_get_attachment_image_url( $attachment_id, 'thumbnail' ) ) . '" data-full="' . esc_url( wp_get_attachment_image_url( $attachment_id, 'full' ) ) . '" alt="">';
							}
						}
						?>
					</div>
					<div class="pg-main-image">
						<img id="mainImage" src="<?php echo esc_url( $main_image_url ); ?>" alt="<?php the_title_attribute(); ?>" />
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="d-flex justify-content-between align-items-start">
					<h1 class="pg-info__title"><?php the_title(); ?></h1>
					<div class="pg-info__price"><?php echo $product->get_price_html(); ?></div>
				</div>

				<div class="pg-info__desc">
					<?php the_excerpt(); ?>
				</div>
				
				<?php 
				$note1 = get_post_meta( get_the_ID(), 'custom_note_1', true );
				$note2 = get_post_meta( get_the_ID(), 'custom_note_2', true );
				if ( $note1 ) echo '<p class="pg-info__note">' . esc_html( $note1 ) . '</p>';
				if ( $note2 ) echo '<p class="pg-info__note">' . esc_html( $note2 ) . '</p>';
				?>

				<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
					<div class="pg-qty">
						<button type="button" class="minus">–</button>
						<input type="number" id="qtyValue" class="qty" name="quantity" value="1" min="1" max="<?php echo esc_attr( $product->get_stock_quantity() ); ?>" style="width: 40px; text-align: center; border: none; background: transparent; font-weight: 600;" />
						<button type="button" class="plus">+</button>
					</div>

					<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn-pg-primary single_add_to_cart_button button alt">Add to cart</button>
				</form>

				<div id="accordionWrap">
					<?php
					// Fetch custom fields for accordion
					$features = get_post_meta( get_the_ID(), 'product_features', true );
					if ( is_array( $features ) ) {
						foreach ( $features as $feature ) {
							?>
							<div class="pg-accordion-item"><span><?php echo esc_html( $feature['title'] ); ?></span><i class="bi bi-plus-lg"></i></div>
							<div class="pg-accordion-body"><?php echo wp_kses_post( $feature['body'] ); ?></div>
							<?php
						}
					} else {
						// Fallback hardcoded if no meta
					?>
						<div class="pg-accordion-item"><span>Real-Time AI Translation</span><i class="bi bi-plus-lg"></i></div>
						<div class="pg-accordion-body">Speak naturally and see instant translated subtitles.</div>
					<?php
					}
					?>
				</div>

				<div class="pg-share">
					Share:
					<a href="#"><i class="bi bi-facebook"></i></a>
					<a href="#"><i class="bi bi-twitter-x"></i></a>
					<a href="#"><i class="bi bi-telegram"></i></a>
					<a href="#"><i class="bi bi-whatsapp"></i></a>
					<a href="#"><i class="bi bi-envelope"></i></a>
				</div>

				<div class="pg-policy">
					<?php echo get_post_meta( get_the_ID(), 'shipping_policy', true ) ?: 'Shipping policy details...'; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ================= FULL IMAGE BANNER ================= -->
	<div class="pg-banner">
		<img
			src="https://placehold.co/1920x760/0a0b0c/333333?text=INMO+GO3+Glasses"
			alt="INMO GO3 close up"
		/>
	</div>

	<!-- ================= HOW IT WORKS ================= -->
	<div class="pg-howitworks">
		<p class="pg-eyebrow">INMO GO3</p>
		<button type="button" class="btn-pg-cta">
			Check How It Works <i class="bi bi-arrow-right ms-1"></i>
		</button>
	</div>

	<!-- ================= ERGONOMIC DESIGN (dark) ================= -->
	<section class="pg-dark-section">
		<p class="pg-eyebrow">INMO GO3</p>
		<h2 class="pg-dark-heading">Ergonomic Design for All-Day Comfort</h2>
		<p class="pg-dark-sub">Precision crafted for lightweight performance</p>

		<div class="row g-3 mb-3" id="featureSmWrap"></div>
		<div class="row g-3 mb-3" id="featureLgWrap1"></div>
		<div class="row g-3" id="featureLgWrap2"></div>
	</section>

	<!-- ================= READY CTA ================= -->
	<div class="pg-dark-section pg-ready" style="padding-top: 0">
		<h2>Are You Ready For INMO GO3?</h2>
		<button type="button" class="btn-pg-cta">
			Buy Now <i class="bi bi-arrow-right ms-1"></i>
		</button>
	</div>

	<!-- ================= APP SECTION ================= -->
	<section class="pg-app">
		<div class="pg-app__text">
			<h3>INMO GO3 APP</h3>
			<p class="pg-app__models">Compatible models:</p>
			<ul class="pg-app__models" style="list-style: none; padding: 0">
				<li><i class="bi bi-check2 me-1"></i>INMO GO3</li>
			</ul>
			<div class="mt-3">
				<a href="#" class="btn-pg-dl"
					>Download for iOS <i class="bi bi-arrow-right"></i
				></a>
				<a href="#" class="btn-pg-dl"
					>Download for Android <i class="bi bi-arrow-right"></i
				></a>
			</div>
		</div>
		<div class="pg-app__logo"><span>INMO</span></div>
	</section>

	<!-- ================= TESTIMONIALS ================= -->
	<section class="pg-testimonials">
		<h2 class="pg-dark-heading">What They Say</h2>
		<p class="pg-dark-sub">Precision Crafted for Lightweight Performance</p>
		<div class="row g-3" id="testiWrap"></div>
	</section>
<?php endwhile; // end of the loop. ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
	// Gallery logic
	const thumbs = document.querySelectorAll('.pg-thumbs img');
	const mainImage = document.getElementById('mainImage');
	
	if(thumbs.length > 0) {
		thumbs.forEach(img => {
			img.addEventListener('click', () => {
				mainImage.src = img.getAttribute('data-full');
				thumbs.forEach(t => t.classList.remove('is-active'));
				img.classList.add('is-active');
			});
		});
	}

	// Accordion logic
	const accordionItems = document.querySelectorAll('.pg-accordion-item');
	accordionItems.forEach(head => {
		head.addEventListener('click', () => head.classList.toggle('is-open'));
	});

	// Qty logic
	const qtyInput = document.getElementById('qtyValue');
	const btnMinus = document.querySelector('.pg-qty .minus');
	const btnPlus = document.querySelector('.pg-qty .plus');
	if (btnMinus && btnPlus && qtyInput) {
		btnMinus.addEventListener('click', () => {
			let val = parseInt(qtyInput.value) || 1;
			if(val > 1) qtyInput.value = val - 1;
		});
		btnPlus.addEventListener('click', () => {
			let val = parseInt(qtyInput.value) || 1;
			qtyInput.value = val + 1;
		});
	}

	// ---- ergonomic feature grids ----
	const featureSmData = [
		{ title: 'Air Cushion Nose Pads', img: 'https://placehold.co/260x210/1a1a1a/ffffff?text=Nose+Pads' },
		{ title: '15° Adaptive Temples', img: 'https://placehold.co/260x210/1a1a1a/ffffff?text=15°' },
		{ title: '8mm Powerful, Not Bulky', img: 'https://placehold.co/260x210/1a1a1a/ffffff?text=8mm' },
		{ title: 'Premium Finish', img: 'https://placehold.co/260x210/1a1a1a/ffffff?text=Finish' },
		{ title: 'Privacy First', img: 'https://placehold.co/260x210/1a1a1a/ffffff?text=Privacy' }
	];
	const featureSmWrap = document.getElementById('featureSmWrap');
	if (featureSmWrap) {
		featureSmData.forEach((f) => {
			const col = document.createElement('div');
			col.className = 'col-6 col-md';
			col.innerHTML = `<div class="pg-feature-sm"><img src="${f.img}" alt="${f.title}"><span>${f.title}</span></div>`;
			featureSmWrap.appendChild(col);
		});
	}

	const featureLgData1 = [
		{ title: 'Dual-Eye Monochrome Display', img: 'https://placehold.co/500x260/1a1a1a/ffffff?text=Display' },
		{ title: 'All-day comfort, lightweight design', img: 'https://placehold.co/500x260/1a1a1a/ffffff?text=Comfort' },
		{ title: 'Voice-activated AI assistant, evolves with use', img: 'https://placehold.co/500x260/1a1a1a/ffffff?text=AI' }
	];
	const featureLgWrap1 = document.getElementById('featureLgWrap1');
	if (featureLgWrap1) {
		featureLgData1.forEach((f) => {
			const col = document.createElement('div');
			col.className = 'col-md-4';
			col.innerHTML = `<div class="pg-feature-lg"><img src="${f.img}" alt="${f.title}"><span>${f.title}</span></div>`;
			featureLgWrap1.appendChild(col);
		});
	}

	const featureLgData2 = [
		{ title: 'AI translation, 98+ languages supported', img: 'https://placehold.co/380x260/1a1a1a/ffffff?text=Translate' },
		{ title: '5-second swap, all-day battery life', img: 'https://placehold.co/380x260/1a1a1a/ffffff?text=Battery' },
		{ title: 'Teleprompter + Meeting summary auto-gen', img: 'https://placehold.co/380x260/1a1a1a/ffffff?text=Teleprompter' },
		{ title: 'AR navigation, hands-free, phone-free', img: 'https://placehold.co/380x260/1a1a1a/ffffff?text=Navigation' }
	];
	const featureLgWrap2 = document.getElementById('featureLgWrap2');
	if (featureLgWrap2) {
		featureLgData2.forEach((f) => {
			const col = document.createElement('div');
			col.className = 'col-6 col-md-3';
			col.innerHTML = `<div class="pg-feature-lg"><img src="${f.img}" alt="${f.title}"><span>${f.title}</span></div>`;
			featureLgWrap2.appendChild(col);
		});
	}

	// ---- testimonials ----
	const testiData = [
		{ name: 'Tyriel Wood - VR Tech', quote: 'This idea should be copied. INMO Go3', img: 'https://placehold.co/300x400/1a1a1a/ffffff?text=Tyriel' },
		{ name: 'CKid', quote: 'The Smart Glasses That Actually Make Sense | INMO GO3 (AR Display, 98 Languages, and more)', img: 'https://placehold.co/300x400/1a1a1a/ffffff?text=CKid' },
		{ name: 'Unbox Therapy', quote: 'Understand almost any language...', img: 'https://placehold.co/300x400/1a1a1a/ffffff?text=Unbox' },
		{ name: 'Steven Sullivan', quote: 'The Most Affordable Navigation Smart Glasses', img: 'https://placehold.co/300x400/1a1a1a/ffffff?text=Steven' },
		{ name: 'Jose Tecnofanatico', quote: "Inmo Go 2 Smart Glasses with Interchangeable Battery / Amazing!", img: 'https://placehold.co/300x400/1a1a1a/ffffff?text=Jose' }
	];
	const testiWrap = document.getElementById('testiWrap');
	if (testiWrap) {
		testiData.forEach((t) => {
			const col = document.createElement('div');
			col.className = 'col-6 col-md';
			col.innerHTML = `
				<div class="pg-testi-card">
					<img src="${t.img}" alt="${t.name}">
					<div class="pg-testi-play"><i class="bi bi-play-fill"></i></div>
				</div>
				<div class="pg-testi-name">${t.name}</div>
				<div class="pg-testi-quote">${t.quote}</div>
			`;
			testiWrap.appendChild(col);
		});
	}
});
</script>

<?php
get_footer( 'shop' );
