<?php
/**
 * Template Name: Support Page
 */

get_header();

$quickLinksData = [
    [ 'title' => 'Quay lại INMOXR', 'link' => '#' ],
    [ 'title' => 'Tải Ứng dụng & Hướng dẫn', 'link' => '#' ],
    [ 'title' => 'Nhà phát triển', 'link' => '#' ],
    [ 'title' => 'Bảo hành', 'link' => '#' ]
];

$supportProductsData = [
    [ 'name' => 'INMO Air3', 'img' => 'https://placehold.co/500x300/1e1e24/ffffff?text=INMO+Air3' ],
    [ 'name' => 'INMO GO', 'img' => 'https://placehold.co/500x300/1e1e24/ffffff?text=INMO+GO' ],
    [ 'name' => 'INMO GO2', 'img' => 'https://placehold.co/500x300/1e1e24/ffffff?text=INMO+GO2' ],
    [ 'name' => 'INMO Air2', 'img' => 'https://placehold.co/500x300/1e1e24/ffffff?text=INMO+Air2' ]
];
?>



<div class="theme-sp-page-wrapper">
    <!-- TOP BAR -->
    <div class="theme-sp-topbar-dark animate-fade-in">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <div class="theme-sp-search-dark">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search">
                <kbd>Ctrl K</kbd>
            </div>
            
            <div class="theme-sp-topbar-right">
                <div class="theme-sp-socials">
                    <a href="mailto:support@inmoxr.com" aria-label="Email"><i class="bi bi-envelope"></i></a>
                    <a href="https://facebook.com/inmo" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://instagram.com/inmo" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://youtube.com/inmo" target="_blank" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    <a href="https://discord.com" target="_blank" aria-label="Discord"><i class="bi bi-discord"></i></a>
                    <a href="https://reddit.com" target="_blank" aria-label="Reddit"><i class="bi bi-reddit"></i></a>
                    <a href="https://x.com/inmo" target="_blank" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                </div>

                <div class="theme-sp-topbar-divider"></div>

                <div class="theme-sp-select">
                    <i class="bi bi-display"></i>
                    <span>Auto</span>
                    <i class="bi bi-chevron-down" style="font-size: 0.8rem; margin-left: 5px;"></i>
                </div>

                <div class="theme-sp-select">
                    <i class="bi bi-translate"></i>
                    <span>English</span>
                    <i class="bi bi-chevron-down" style="font-size: 0.8rem; margin-left: 5px;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="theme-sp-container">
        <!-- TITLE -->
        <h1 class="theme-sp-main-title animate-fade-in py-5">Trung tâm Hỗ trợ INMO</h1>

        <!-- QUICK LINKS -->
        <div class="row g-4 animate-slide-up" style="animation-delay: 0.1s;">
            <?php foreach($quickLinksData as $q): ?>
            <div class="col-12 col-md-6">
                <a href="<?php echo esc_url($q['link']); ?>" class="theme-sp-ql-btn">
                    <span><?php echo esc_html($q['title']); ?></span>
                    <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- PRODUCT SUPPORT -->
        <h2 class="theme-sp-section-title animate-slide-up py-5" style="animation-delay: 0.2s;">Hỗ trợ Sản phẩm</h2>
        <div class="row g-4 animate-slide-up" style="animation-delay: 0.3s;">
            <?php foreach($supportProductsData as $p): ?>
            <div class="col-12 col-md-6">
                <div class="theme-sp-product-card">
                    <img src="<?php echo esc_url($p['img']); ?>" alt="<?php echo esc_attr($p['name']); ?>">
                    <h3><?php echo esc_html($p['name']); ?></h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- STILL NEED HELP -->
        <div class="theme-sp-help-block animate-slide-up" style="animation-delay: 0.4s;">
            <h2>Bạn Cần Hỗ trợ Thêm?</h2>
            <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn bất cứ lúc nào.</p>
            <div class="theme-sp-contact-options">
                <a href="mailto:support@inmoxr.com" class="theme-sp-contact-item">
                    <div class="theme-sp-contact-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <span>Gửi Email</span>
                </a>
                <a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="theme-sp-contact-item">
                    <div class="theme-sp-contact-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <span>Trò chuyện Trực tuyến</span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
