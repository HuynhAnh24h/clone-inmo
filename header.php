<!doctype html>
<html <?php language_attributes(); ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<?php if ( is_page_template('page-support.php') ) { ?>
	<!-- No header for support page -->
<?php } elseif ( is_account_page() && ! is_user_logged_in() ) { ?>
	<div class="text-center py-5">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/INMO_LOGO-Black.webp" alt="<?php bloginfo( 'name' ); ?>" style="max-height: 40px;">
		</a>
	</div>
<?php } else { ?>
<div class="topbar p-1">
	<p class="text-center">
	Nhận ưu đãi <span class="hight-light-text">giảm 100 USD</span> cho Kính AI GO3. Đăng ký nhận bản tin để lấy mã.
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
				<i class="bi bi-list icon-shake" style="font-size: 2rem; color: #111;"></i>
			</button>

			<!-- Menu & Icons -->
			<div class="collapse navbar-collapse justify-content-between" id="themeNavbar">
				<div class="theme-navbar mx-auto mt-3 mt-lg-0">
					<?php
					$has_custom_menu = is_nav_menu( 'main-menu' );
					if ( $has_custom_menu || has_nav_menu( 'menu-1' ) ) {
						$menu_args = array(
							'menu_id'     => 'primary-menu',
							'menu_class'  => 'theme-navbar-list d-flex flex-column flex-lg-row align-items-lg-center m-0 p-0',
							'container'   => false,
							'fallback_cb' => false,
						);
						if ( $has_custom_menu ) {
							$menu_args['menu'] = 'main-menu';
						} else {
							$menu_args['theme_location'] = 'menu-1';
						}
						wp_nav_menu( $menu_args );
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
						<a href="#searchOffcanvas" data-bs-toggle="offcanvas" role="button" aria-controls="searchOffcanvas" class="text-reset">
							<i class="bi bi-search icon-shake"></i>
						</a>
					</div>
					<div class="header-icon">
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="text-reset">
							<i class="bi bi-person icon-shake"></i>
						</a>
					</div>
					<div class="header-icon position-relative">
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="text-reset cart-customlocation" title="<?php esc_attr_e( 'View your shopping cart', 'inmo-theme' ); ?>">
							<i class="bi bi-cart3 icon-shake"></i>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count-badge" style="font-size: 0.6rem; transform: translate(-30%, 10%) !important;">
								<?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<!-- Search Offcanvas -->
	<div class="offcanvas offcanvas-end" tabindex="-1" id="searchOffcanvas" aria-labelledby="searchOffcanvasLabel" style="width: 450px; max-width: 100vw; border-radius: 20px 0 0 20px;">
		<div class="offcanvas-header p-4 pb-2">
			<h5 class="offcanvas-title fs-4" id="searchOffcanvasLabel" style="font-weight: 500;">Tìm kiếm</h5>
			<button type="button" class="btn-close shadow-none rounded-circle border" data-bs-dismiss="offcanvas" aria-label="Close" style="padding: 10px; font-size: 10px;"></button>
		</div>
		<div class="offcanvas-body p-4 pt-3">
			<form role="search" id="offcanvasSearchForm" method="get" class="woocommerce-product-search m-0 position-relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" id="offcanvasSearchInput" class="form-control border-0 shadow-none px-4 py-3" style="background-color: #f4f4f4; border-radius: 10px; font-size: 15px;" placeholder="Tìm kiếm sản phẩm..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
				<input type="hidden" name="post_type" value="product" />
				<button type="submit" class="d-none">Tìm</button>
			</form>
			<!-- AJAX Search Results Container -->
			<div id="ajaxSearchResults" class="mt-3" style="max-height: calc(100vh - 150px); overflow-y: auto;"></div>
		</div>
	</div>
</header>
<?php } ?>
