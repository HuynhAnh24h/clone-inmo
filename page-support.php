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

<style>
/* CSS Nhanh cho giao diện Hỗ trợ mới */
.theme-sp-page-wrapper {
    background-color: #151619;
    color: #fff;
    min-height: 100vh;
    padding-bottom: 80px;
    font-family: 'Inter', sans-serif;
}
.theme-sp-topbar-dark {
    background-color: #1c1d21;
    border-bottom: 1px solid #2a2b2f;
    padding: 10px 0;
}
.theme-sp-search-dark {
    display: flex;
    align-items: center;
    background: #151619;
    border: 1px solid #333;
    border-radius: 6px;
    padding: 5px 12px;
    width: 300px;
}
.theme-sp-search-dark input {
    background: transparent;
    border: none;
    color: #fff;
    outline: none;
    width: 100%;
    margin-left: 10px;
}
.theme-sp-search-dark kbd {
    background: #2a2b2f;
    border-radius: 4px;
    padding: 2px 6px;
    font-size: 11px;
    color: #aaa;
}
.theme-sp-topbar-right {
    display: flex;
    align-items: center;
    gap: 20px;
}
.theme-sp-socials {
    display: flex;
    align-items: center;
    gap: 15px;
}
.theme-sp-socials a {
    color: #a0a0a0;
    font-size: 1.1rem;
    transition: color 0.2s;
}
.theme-sp-socials a:hover {
    color: #fff;
}
.theme-sp-topbar-divider {
    width: 1px;
    height: 20px;
    background-color: #333;
    margin: 0 5px;
}
.theme-sp-select {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #fff;
    font-size: 0.9rem;
    cursor: pointer;
}
.theme-sp-select i {
    color: #a0a0a0;
}
.theme-sp-select:hover i, .theme-sp-select:hover span {
    color: #2de6a8;
}
.theme-sp-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px;
}
.theme-sp-main-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-top: 60px;
    margin-bottom: 40px;
}
.theme-sp-ql-btn {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #1c1d21;
    border: 1px solid #2a2b2f;
    border-radius: 8px;
    padding: 16px 20px;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
}
.theme-sp-ql-btn:hover {
    background-color: #2a2b2f;
    color: #fff;
}
.theme-sp-ql-btn i {
    font-size: 1.1rem;
    color: #888;
}
.theme-sp-section-title {
    text-align: center;
    font-size: 1.8rem;
    font-weight: 700;
    margin: 80px 0 50px;
}
.theme-sp-product-card {
    background-color: #1c1d21;
    border-radius: 12px;
    overflow: hidden;
    text-align: center;
    padding-bottom: 20px;
    transition: transform 0.3s ease;
}
.theme-sp-product-card:hover {
    transform: translateY(-5px);
}
.theme-sp-product-card img {
    width: 100%;
    height: 250px;
    object-fit: contain;
    background-color: #1c1d21;
    padding: 20px;
}
.theme-sp-product-card h3 {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 15px 0 0;
}
.theme-sp-help-block {
    text-align: center;
    margin-top: 80px;
}
.theme-sp-help-block h2 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 10px;
}
.theme-sp-help-block p {
    color: #aaa;
    margin-bottom: 40px;
}
.theme-sp-contact-options {
    display: flex;
    justify-content: center;
    gap: 40px;
}
.theme-sp-contact-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    color: #fff;
    transition: all 0.3s ease;
}
.theme-sp-contact-item:hover {
    color: #2de6a8;
}
.theme-sp-contact-icon {
    width: 60px;
    height: 60px;
    background-color: #fff;
    color: #000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}
.theme-sp-contact-item:hover .theme-sp-contact-icon {
    transform: scale(1.1);
}
</style>

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
