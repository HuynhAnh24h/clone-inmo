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
				<span class="navbar-toggler-icon"></span>
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
							<li class="theme-navbar-list-item"><a href="#">Tất cả sản phẩm</a></li>
							<li class="theme-navbar-list-item"><a href="#">Inmo g03</a></li>
							<li class="theme-navbar-list-item"><a href="#">G03 Bundles</a></li>
							<li class="theme-navbar-list-item"><a href="#">Về Chúng tôi</a></li>
							<li class="theme-navbar-list-item"><a href="#">Liên Hệ</a></li>
							<li class="theme-navbar-list-item"><a href="#">Hỗ trợ</a></li>
						</ul>
						<?php
					}
					?>
				</div>

				<div class="header-icon-wrap d-flex align-items-center gap-3 mt-3 mt-lg-0 justify-content-center justify-content-lg-end">
					<div class="header-icon"><i class="bi bi-search"></i></div>
					<div class="header-icon"><i class="bi bi-person"></i></div>
					<div class="header-icon"><i class="bi bi-cart3"></i></div>
				</div>
			</div>
		</div>
	</nav>
</header>
