<?php if ( ! ( is_account_page() && ! is_user_logged_in() ) && ! is_page_template('page-support.php') ) { ?>
<footer class="footer-wrapper">
	<div class="footer py-5">
	<div class="container mx-auto py-5">
		<div class="row">
		<div class="col-lg-7">
		<div class="row">
			<div class="col-md-4">
			<p class="theme-footer-text-heading">Sản phẩm</p>
			<ul>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/inmo-go3/' ) ); ?>">INMO GO3</a></li>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/inmo-air3/' ) ); ?>">INMO Air3</a></li>
			</ul>
			</div>
			<div class="col-md-4">
			<p class="theme-footer-text-heading">Thương hiệu</p>
			<ul>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/ve-chung-toi/' ) ); ?>">Về chúng tôi</a></li>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>">Liên hệ</a></li>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/dai-ly-phan-phoi/' ) ); ?>">Đại lý phân phối</a></li>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>">Tin tức</a></li>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/bo-phuong-tien/' ) ); ?>">Bộ phương tiện</a></li>
			</ul>
			</div>
			<div class="col-md-4">
			<p class="theme-footer-text-heading">Hỗ trợ</p>
			<ul>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/trung-tam-tro-giup-thong-minh/' ) ); ?>">Trung tâm trợ giúp thông minh</a></li>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/tai-ung-dung-va-huong-dan/' ) ); ?>">Tải ứng dụng & Hướng dẫn</a></li>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/canh-bao-an-toan-suc-khoe/' ) ); ?>">Cảnh báo an toàn sức khỏe INMO Air3</a></li>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/bao-hanh/' ) ); ?>">Bảo hành</a></li>
				<li class="theme-footer-link"><a href="<?php echo esc_url( home_url( '/phuong-thuc-thanh-toan/' ) ); ?>">Phương thức thanh toán</a></li>
			</ul>
			</div>
		</div>
		</div>
		<div class="col-lg-1 d-none d-lg-flex justify-content-center">
			<div style="width: 1px; background-color: #333; height: 100%;"></div>
		</div>
		<div class="col-lg-4 mt-5 mt-lg-0">
		<p class="theme-footer-text-heading" style="font-size: 1.5rem; margin-bottom: 20px;">Liên hệ với chúng tôi</p>
		<ul>
			<li class="theme-footer-link" style="margin-bottom: 10px;">
			<i class="bi bi-telephone"></i> Tel: +1 800-689-8547
			</li>
			<li class="theme-footer-link" style="margin-bottom: 20px;">
			<i class="bi bi-envelope"></i> Email: support@inmoxr.com
			</li>
			<li>
			<p class="theme-footer-link" style="font-weight: 500; font-size: 0.9rem; line-height: 1.4; color: #fff; margin-bottom: 15px;">
				Đăng ký bên dưới để nhận mã giảm giá 100 USD cho Kính INMO Go3.
			</p>
			<form action="" class="theme-footer-form" style="position: relative; max-width: 320px;">
				<input type="email" class="footer-input" placeholder="Nhập email của bạn" style="width: 100%; background: #222; border: none; border-radius: 30px; padding: 12px 20px; color: #fff; outline: none;" />
				<button type="submit" class="footer-submit" aria-label="Submit" style="position: absolute; right: 5px; top: 5px; width: 34px; height: 34px; border-radius: 50%; border: none; background: #fff; color: #000; display: flex; align-items: center; justify-content: center; cursor: pointer;">
				<i class="bi bi-arrow-right"></i>
				</button>
			</form>
			</li>
		</ul>
		<div class="d-flex justify-content-start align-items-center mt-4 gap-3">
			<a href="https://facebook.com/inmo" target="_blank" class="theme-footer-social-icon"><i class="bi bi-facebook"></i></a>
			<a href="https://x.com/inmo" target="_blank" class="theme-footer-social-icon"><i class="bi bi-twitter-x"></i></a>
			<a href="https://instagram.com/inmo" target="_blank" class="theme-footer-social-icon"><i class="bi bi-instagram"></i></a>
			<a href="https://youtube.com/inmo" target="_blank" class="theme-footer-social-icon"><i class="bi bi-youtube"></i></a>
			<a href="https://tiktok.com/@inmo" target="_blank" class="theme-footer-social-icon"><i class="bi bi-tiktok"></i></a>
		</div>
		</div>
		</div>
	</div>
	</div>
	<div class="footer-bottom py-4 px-3 px-md-5" style="border-top: 1px solid #222; background-color: #111;">
	<div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
		<div class="theme-footer-box">
		<p class="theme-footer-bottom-text mb-2">
			FLAT/RM A 12/F, ZJ 300, 300 LOCKHART ROAD, WAN CHAI, HONG KONG
		</p>
		<p class="theme-footer-bottom-text mb-2">
			INMO INTERNATIONAL TECHNOLOGY LIMITED
		</p>
		<p class="theme-footer-bottom-text mb-2">© <?php echo date('Y'); ?> INMO.</p>
		<ul class="d-flex flex-wrap justify-content-start align-items-center gap-3 mt-3" style="list-style: none; padding: 0;">
			<li><a href="<?php echo esc_url( home_url( '/chinh-sach-hoan-tien/' ) ); ?>" class="theme-footer-bottom-link">Chính sách hoàn tiền</a></li>
			<li><a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat/' ) ); ?>" class="theme-footer-bottom-link">Chính sách bảo mật</a></li>
			<li><a href="<?php echo esc_url( home_url( '/dieu-khoan-dich-vu/' ) ); ?>" class="theme-footer-bottom-link">Điều khoản dịch vụ</a></li>
			<li><a href="<?php echo esc_url( home_url( '/chinh-sach-van-chuyen/' ) ); ?>" class="theme-footer-bottom-link">Chính sách vận chuyển</a></li>
			<li><a href="<?php echo esc_url( home_url( '/thong-tin-lien-he/' ) ); ?>" class="theme-footer-bottom-link">Thông tin liên hệ</a></li>
			<li><a href="<?php echo esc_url( home_url( '/thong-bao-phap-ly/' ) ); ?>" class="theme-footer-bottom-link">Thông báo pháp lý</a></li>
		</ul>
		</div>
		<div class="theme-footer-box d-flex justify-content-center">
			<div class="footer-bottom-buton" style="border: 1px solid #444; border-radius: 20px; padding: 6px 16px; color: #fff; cursor: pointer; display: flex; align-items: center; gap: 8px;">
				<i class="bi bi-globe"></i> Tiếng Việt <i class="bi bi-chevron-down" style="font-size: 0.8rem;"></i>
			</div>
		</div>
		<div class="theme-footer-box">
		<ul class="theme-footer-payment-icon d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center gap-2 m-0 p-0" style="list-style: none;">
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/paypal.svg" height="20" width="auto" alt="paypal" loading="lazy" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/master.svg" height="20" alt="master" loading="lazy" width="auto" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/visa.svg" height="20" alt="visa" loading="lazy" width="auto" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/maestro.svg" height="20" alt="maestro" loading="lazy" width="auto" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/jcb.svg" height="20" alt="jcb" loading="lazy" width="auto" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/american_express.svg" height="20" alt="american express" loading="lazy" width="auto" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/diners_club.svg" height="20" alt="diners club" loading="lazy" width="auto" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/discover.svg" height="20" alt="discover" loading="lazy" width="auto" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/klarna.svg" height="20" alt="klarna" loading="lazy" width="auto" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/google_pay.svg" height="20" alt="googlepay" loading="lazy" width="auto" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/apple_pay.svg" height="20" alt="applepay" loading="lazy" width="auto" /></li>
		</ul>
		</div>
	</div>
	</div>

	<!-- Promo Modal Overlay -->
	<div class="theme-promo-modal-overlay" id="promoModalOverlay">
		<div class="theme-promo-modal">
			<button type="button" class="theme-promo-close" id="promoModalClose"><i class="bi bi-x-lg"></i></button>
			<div class="theme-promo-content d-flex">
				<div class="theme-promo-text">
					<h3>Ưu đãi giới hạn giảm 100 USD<br>Kính INMO GO3</h3>
					<p>Tiết kiệm cho đơn hàng đầu tiên và nhận các ưu đãi độc quyền qua email</p>
					<form id="discountFormFooter" class="theme-promo-form">
						<input type="email" name="email" class="theme-promo-input" placeholder="Nhập email của bạn" required />
						<button type="submit" class="theme-promo-btn"><i class="bi bi-arrow-right"></i></button>
						<div class="discountResponse" style="display:none; width:100%; margin-top: 10px; font-size: 0.85rem; color: #fff;"></div>
					</form>
				</div>
				<div class="theme-promo-logo d-none d-md-flex">
					<h2>INMO</h2>
				</div>
			</div>
		</div>
	</div>

	<!-- Sticky Claim Button -->
	<button class="theme-sticky-claim-btn" id="promoStickyBtn">Nhận ưu đãi 100 USD</button>
</footer>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>
