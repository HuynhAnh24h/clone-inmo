<?php
/**
 * Template Name: Support Page
 */

get_header();

$quickLinksData = [
    [ 'title' => 'APP & Tutorials', 'img' => 'https://placehold.co/80x80/0f1512/2de6a8?text=APP' ],
    [ 'title' => 'Service Support', 'img' => 'https://placehold.co/80x80/0f1512/6ee7ff?text=Support' ],
    [ 'title' => 'INMO Warranty', 'img' => 'https://placehold.co/80x80/0f1512/2de6a8?text=Warranty' ],
    [ 'title' => 'Payment Method', 'img' => 'https://placehold.co/80x80/0f1512/6ee7ff?text=Payment' ]
];

$supportProductsData = [
    [ 'name' => 'INMO AIR', 'img' => 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+AIR' ],
    [ 'name' => 'INMO AIR2', 'img' => 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+AIR2' ],
    [ 'name' => 'INMO GO', 'img' => 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+GO' ],
    [ 'name' => 'INMO AIR3', 'img' => 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+AIR3' ],
    [ 'name' => 'INMO GO2', 'img' => 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+GO2' ],
    [ 'name' => 'INMO X', 'img' => 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+X' ]
];
?>

<!-- ================= TOP BAR (Support specific) ================= -->
<div class="theme-sp-topbar animate-fade-in">
  <div class="theme-sp-search">
    <i class="bi bi-search"></i>
    <input type="text" placeholder="Search">
    <kbd>Ctrl K</kbd>
  </div>

  <div class="theme-sp-topbar__right">
    <div class="theme-sp-socials">
      <a href="#" aria-label="Email"><i class="bi bi-envelope"></i></a>
      <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
      <a href="#" aria-label="Discord"><i class="bi bi-discord"></i></a>
      <a href="#" aria-label="Reddit"><i class="bi bi-reddit"></i></a>
      <a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
    </div>

    <div class="theme-sp-select">
      <i class="bi bi-circle-half"></i>
      <span>Auto</span>
      <i class="bi bi-chevron-down"></i>
    </div>

    <div class="theme-sp-select">
      <i class="bi bi-translate"></i>
      <span>English</span>
      <i class="bi bi-chevron-down"></i>
    </div>
  </div>
</div>

<!-- ================= TITLE ================= -->
<div class="theme-sp-title-divider animate-fade-in">
  <h1 class="theme-sp-title">INMO Support</h1>
</div>

<!-- ================= QUICK LINKS ================= -->
<div class="theme-sp-links animate-slide-up">
  <div class="row g-3" id="quickLinksWrap">
      <?php foreach($quickLinksData as $q): ?>
      <div class="col-6 col-md-3">
          <a href="#" class="theme-sp-ql">
              <div class="theme-sp-ql__icon">
                  <img src="<?php echo esc_url($q['img']); ?>" alt="<?php echo esc_attr($q['title']); ?>">
              </div>
              <div class="theme-sp-ql__title"><?php echo esc_html($q['title']); ?></div>
          </a>
      </div>
      <?php endforeach; ?>
  </div>
</div>

<!-- ================= PRODUCT SUPPORT ================= -->
<div class="container py-4 animate-slide-up" style="animation-delay: 0.1s;">
  <h2 class="theme-sp-theme-section-heading">Product Support</h2>
  <div class="row row-cols-1 row-cols-md-2 g-5" id="productsWrap">
      <?php foreach($supportProductsData as $p): ?>
      <div class="col-6 col-md-4">
          <div class="theme-sp-product">
              <div class="theme-sp-product__media">
                  <img src="<?php echo esc_url($p['img']); ?>" alt="<?php echo esc_attr($p['name']); ?>">
              </div>
              <div class="theme-sp-product__name"><?php echo esc_html($p['name']); ?></div>
              <a href="#" class="theme-sp-product__link">View Details</a>
          </div>
      </div>
      <?php endforeach; ?>
  </div>
</div>

<!-- ================= STILL NEED HELP ================= -->
<div class="theme-sp-help animate-slide-up" style="animation-delay: 0.2s;">
  <h2 class="theme-sp-help__title">Still Need Help?</h2>
  <p class="theme-sp-help__desc">We're happy to assist you whenever you need us.</p>

  <div class="theme-sp-help__options">
    <a href="#" class="theme-sp-help__option">
      <span class="theme-sp-help__icon"><i class="bi bi-headset"></i></span>
      Email us
    </a>
    <a href="#" class="theme-sp-help__option">
      <span class="theme-sp-help__icon"><i class="bi bi-chat-dots"></i></span>
      Live Chat
    </a>
  </div>
</div>

<?php
get_footer();
