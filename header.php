<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<div class="topbar p-1">
	<p class="text-center">
	Get <span class="hight-light-text">$100 OFF</span> GO3 AI Glasses. Sign
	up for our newsletter for the code.
	</p>
</div>
<header class="header">
	<nav class="navbar navbar-expand-lg px-3 px-md-5 py-2 w-100">
		<div class="container-fluid p-0">
			<!-- Logo -->
			<a class="navbar-brand logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/INMO_LOGO-Black.webp" alt="<?php bloginfo( 'name' ); ?>" style="max-height: 40px;">
			</a>

			<!-- Mobile Toggle -->
			<button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#themeNavbar" aria-controls="themeNavbar" aria-expanded="false" aria-label="Toggle navigation">
				<i class="bi bi-list" style="font-size: 2rem; color: #111;"></i>
			</button>

			<!-- Menu & Icons -->
			<div class="collapse navbar-collapse justify-content-between" id="themeNavbar">
				<div class="theme-navbar mx-auto mt-3 mt-lg-0">
					<?php
					if ( has_nav_menu( 'menu-1' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'theme-navbar-list d-flex flex-column flex-lg-row align-items-lg-center m-0 p-0',
								'container'      => false,
								'fallback_cb'    => false,
							)
						);
					} else {
						?>
						<ul class="theme-navbar-list d-flex flex-column flex-lg-row align-items-lg-center m-0 p-0">
							<li class="theme-navbar-list-item has-mega-menu position-relative">
								<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Sản Phẩm</a>
								<div class="mega-menu-dropdown">
									<?php if ( function_exists( 'inmo_get_hierarchical_categories_html' ) ) echo inmo_get_hierarchical_categories_html(); ?>
								</div>
							</li>
							<li class="theme-navbar-list-item"><a href="<?php echo esc_url( home_url( '/ve-chung-toi/' ) ); ?>">Về Chúng tôi</a></li>
							<li class="theme-navbar-list-item"><a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>">Liên Hệ</a></li>
							<li class="theme-navbar-list-item"><a href="<?php echo esc_url( home_url( '/ho-tro/' ) ); ?>">Hỗ trợ</a></li>
						</ul>
						<?php
					}
					?>
				</div>

				<div class="header-icon-wrap d-flex align-items-center gap-3 mt-3 mt-lg-0 justify-content-center justify-content-lg-end">
					<div class="header-icon">
						<a href="#" data-bs-toggle="collapse" data-bs-target="#searchCollapse" aria-expanded="false" aria-controls="searchCollapse" class="text-reset">
							<i class="bi bi-search"></i>
						</a>
					</div>
					<div class="header-icon">
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="text-reset">
							<i class="bi bi-person"></i>
						</a>
					</div>
					<div class="header-icon position-relative">
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="text-reset cart-customlocation" title="<?php esc_attr_e( 'View your shopping cart', 'inmo-theme' ); ?>">
							<i class="bi bi-cart3"></i>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count-badge" style="font-size: 0.6rem; transform: translate(-30%, 10%) !important;">
								<?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<!-- Search Collapse Dropdown -->
	<div class="collapse w-100 bg-white border-bottom shadow-sm" id="searchCollapse" style="position: absolute; top: 100%; left: 0; z-index: 1000;">
		<div class="container-fluid py-3 px-3 px-md-5">
			<form role="search" method="get" class="d-flex align-items-center woocommerce-product-search m-0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" class="form-control border-0 shadow-none fs-5 bg-transparent" placeholder="Tìm kiếm sản phẩm..." value="<?php echo get_search_query(); ?>" name="s" />
				<input type="hidden" name="post_type" value="product" />
				<button type="submit" class="btn btn-dark rounded-pill px-4">Tìm</button>
			</form>
		</div>
	</div>
</header>
