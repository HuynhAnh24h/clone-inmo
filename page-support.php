<?php
/**
 * Template Name: Support Page
 */

get_header();
?>

<!-- ================= TOP BAR (Support specific) ================= -->
<div class="sp-topbar animate-fade-in">
  <div class="sp-search">
    <i class="bi bi-search"></i>
    <input type="text" placeholder="Search">
    <kbd>Ctrl K</kbd>
  </div>

  <div class="sp-topbar__right">
    <div class="sp-socials">
      <a href="#" aria-label="Email"><i class="bi bi-envelope"></i></a>
      <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
      <a href="#" aria-label="Discord"><i class="bi bi-discord"></i></a>
      <a href="#" aria-label="Reddit"><i class="bi bi-reddit"></i></a>
      <a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
    </div>

    <div class="sp-select">
      <i class="bi bi-circle-half"></i>
      <span>Auto</span>
      <i class="bi bi-chevron-down"></i>
    </div>

    <div class="sp-select">
      <i class="bi bi-translate"></i>
      <span>English</span>
      <i class="bi bi-chevron-down"></i>
    </div>
  </div>
</div>

<!-- ================= TITLE ================= -->
<div class="sp-title-divider animate-fade-in">
  <h1 class="sp-title">INMO Support</h1>
</div>

<!-- ================= QUICK LINKS ================= -->
<div class="sp-links animate-slide-up">
  <div class="row g-3" id="quickLinksWrap"></div>
</div>

<!-- ================= PRODUCT SUPPORT ================= -->
<div class="container py-4 animate-slide-up" style="animation-delay: 0.1s;">
  <h2 class="sp-section-heading">Product Support</h2>
  <div class="row row-cols-1 row-cols-md-2 g-5" id="productsWrap"></div>
</div>

<!-- ================= STILL NEED HELP ================= -->
<div class="sp-help animate-slide-up" style="animation-delay: 0.2s;">
  <h2 class="sp-help__title">Still Need Help?</h2>
  <p class="sp-help__desc">We're happy to assist you whenever you need us.</p>

  <div class="sp-help__options">
    <a href="#" class="sp-help__option">
      <span class="sp-help__icon"><i class="bi bi-headset"></i></span>
      Email us
    </a>
    <a href="#" class="sp-help__option">
      <span class="sp-help__icon"><i class="bi bi-chat-dots"></i></span>
      Live Chat
    </a>
  </div>
</div>

<script>
  // ---- quick links ----
  const quickLinksData = [
	{ title: 'APP & Tutorials', img: 'https://placehold.co/80x80/0f1512/2de6a8?text=APP' },
	{ title: 'Service Support', img: 'https://placehold.co/80x80/0f1512/6ee7ff?text=Support' },
	{ title: 'INMO Warranty', img: 'https://placehold.co/80x80/0f1512/2de6a8?text=Warranty' },
	{ title: 'Payment Method', img: 'https://placehold.co/80x80/0f1512/6ee7ff?text=Payment' }
  ];
  const qlWrap = document.getElementById('quickLinksWrap');
  if (qlWrap) {
	  quickLinksData.forEach((q) => {
		const col = document.createElement('div');
		col.className = 'col-6 col-md-3';
		col.innerHTML = `
		  <a href="#" class="sp-ql">
			<div class="sp-ql__icon"><img src="${q.img}" alt="${q.title}"></div>
			<div class="sp-ql__title">${q.title}</div>
		  </a>
		`;
		qlWrap.appendChild(col);
	  });
  }
 
  // ---- products support ----
  const productsData = [
	{ name: 'INMO AIR', img: 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+AIR' },
	{ name: 'INMO AIR2', img: 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+AIR2' },
	{ name: 'INMO GO', img: 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+GO' },
	{ name: 'INMO AIR3', img: 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+AIR3' },
	{ name: 'INMO GO2', img: 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+GO2' },
	{ name: 'INMO X', img: 'https://placehold.co/300x250/0f1512/ffffff?text=INMO+X' }
  ];
  const productsWrap = document.getElementById('productsWrap');
  if (productsWrap) {
	  productsData.forEach((p) => {
		const col = document.createElement('div');
		col.className = 'col-6 col-md-4';
		col.innerHTML = `
		  <div class="sp-product">
			<div class="sp-product__media"><img src="${p.img}" alt="${p.name}"></div>
			<div class="sp-product__name">${p.name}</div>
			<a href="#" class="sp-product__link">View Details</a>
		  </div>
		`;
		productsWrap.appendChild(col);
	  });
  }
</script>

<?php
get_footer();
