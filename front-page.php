<?php
/**
 * The front page template file
 */

get_header();
?>

<!-- Hero Section -->
<section class="section-hero-wrapper animate-fade-in">
	<div class="container d-flex justify-content-start align-items-center">
	<div class="section-hero-content">
		<p class="section-hero-hight-light-text">
		Kính AI INMO GO3 – Dùng hàng ngày
		</p>
		<p class="section-hero-text">
		Kính <span class="theme-hight-light">dịch thuật AI</span>
		</p>
		<p class="section-hero-text">Dành cho</p>
		<p class="section-hero-text mb-5">
		Nhu cầu sử dụng <span class="theme-hight-light">hàng ngày</span>
		</p>
		<button class="theme-primary-btn">
		Mua Ngay <i class="bi bi-chevron-right"></i>
		</button>
	</div>
	</div>
</section>
<!-- End Hero Section -->

<!-- Section Discount -->
<section class="section-discount-wrapper py-5 animate-slide-up">
	<div class="container d-flex flex-column justify-content-center align-items-center py-5">
	<p class="section-discount-text-heading">
		Giảm ngay <span class="theme-hight-light">100 USD </span>cho Kính AI
		GO3
	</p>
	<p class="section-discount-subtext">
		Nhận thông tin mới nhất từ ​​INMO.
	</p>
	<form class="section-discount-form" onsubmit="return false;">
		<div class="section-discount-email-pill d-flex align-items-center">
		<input type="email" class="email-input" placeholder="Enter your email" required autocomplete="email" />
		<button type="submit" class="section-discount-email-submit" aria-label="Gửi email">
			<i class="bi bi-arrow-right"></i>
		</button>
		</div>
	</form>
	</div>
</section>
<!-- Section Discount -->

<!-- Index Page  -->
<div class="container py-5 animate-fade-in">
	<p class="theme-title">Về INMO</p>
</div>

<section class="section-about-wrapper animate-fade-in">
	<div class="container py-5">
	<div class="col-md-6">
		<p class="section-about-title">INMOXR</p>
		<p class="section-about-text">
		INMO tập trung vào nghiên cứu và phát triển kính thông minh, là đơn
		vị tiên phong trong lĩnh vực kính AR không dây và kính thông minh
		tích hợp AI, đồng thời là doanh nghiệp hàng đầu trong ngành hàng
		kính thông minh toàn cầu.
		</p>
		<button class="section-about-btn">
		Tìm hiểu thêm <i class="bi bi-arrow-right"></i>
		</button>
	</div>
	</div>
</section>
<!-- End Index Page  -->

<div class="container py-5 animate-fade-in">
	<p class="theme-title">Tính năng đột phá</p>
</div>

<div class="section-slide-block animate-slide-up">
	<div class="section-slide-viewport">
	<div class="section-slide-track" id="sectionSlideTrack">
		<!-- JS renders this -->
	</div>
	</div>

	<div class="section-slide-nav">
	<button type="button" class="section-slide-nav__btn" id="sectionSlidePrevBtn">
		<i class="bi bi-arrow-left"></i>
	</button>
	<div class="section-slide-dots" id="sectionSlideDots"></div>
	<button type="button" class="section-slide-nav__btn" id="sectionSlideNextBtn">
		<i class="bi bi-arrow-right"></i>
	</button>
	</div>
</div>

<div class="container py-5 animate-fade-in">
	<p class="theme-title">KOL Reality Labs</p>
</div>
<section class="kol-slide container animate-slide-up">
	<div class="kol-slide__viewport">
	<button type="button" class="kol-slide__nav-btn kol-slide__nav-btn--prev" id="kolPrevBtn">
		<i class="bi bi-chevron-left"></i>
	</button>

	<div class="kol-slide__track" id="kolTrack">
		<!-- JS renders this -->
	</div>

	<button type="button" class="kol-slide__nav-btn kol-slide__nav-btn--next" id="kolNextBtn">
		<i class="bi bi-chevron-right"></i>
	</button>
	</div>

	<div class="kol-slide__dots" id="kolDots"></div>
</section>

<script>
  (function () {
	// 👉 khai báo slide ở đây, thêm/bớt bao nhiêu cũng được
	const slidesData = [
	  { videoId: "jNQXAC9IVRw", title: "Business-ready with" },
	  { videoId: "2Vv-BfVoq4g", title: "Tối ưu quy trình" },
	  { videoId: "aqz-KE-bpKQ", title: "Kết nối liền mạch" },
	];

	const track = document.getElementById("sectionSlideTrack");
	const viewport = track.parentElement;
	const dotsWrap = document.getElementById("sectionSlideDots");
	const prevBtn = document.getElementById("sectionSlidePrevBtn");
	const nextBtn = document.getElementById("sectionSlideNextBtn");

	let activeIndex = 0;

	// render toàn bộ item 1 lần
	slidesData.forEach((slide, i) => {
	  const item = document.createElement("div");
	  item.className = "section-slide-item";
	  item.dataset.index = i;
	  item.innerHTML = `
  <div class="section-slide-item__media">
	<img src="https://img.youtube.com/vi/${slide.videoId}/hqdefault.jpg" alt="${slide.title}">
  </div>
  <div class="section-slide-item__overlay"></div>
  <div class="section-slide-item__content">
	<p class="section-slide-item__title">${slide.title}</p>
	<button type="button" class="section-slide-item__cta">Xem thêm</button>
  </div>
`;
	  item.addEventListener("click", () => goTo(i));
	  track.appendChild(item);
	});

	const items = track.querySelectorAll(".section-slide-item");

	// render dot
	slidesData.forEach((_, i) => {
	  const dot = document.createElement("button");
	  dot.type = "button";
	  dot.className = "section-slide-dots__dot";
	  dot.addEventListener("click", () => goTo(i));
	  dotsWrap.appendChild(dot);
	});
	const dots = dotsWrap.querySelectorAll(".section-slide-dots__dot");

	function loadActiveVideo() {
	  items.forEach((item, i) => {
		const media = item.querySelector(".section-slide-item__media");
		if (i === activeIndex) {
		  media.innerHTML = `<iframe
		src="https://www.youtube.com/embed/${slidesData[i].videoId}?autoplay=1&mute=1&loop=1&playlist=${slidesData[i].videoId}&controls=0&showinfo=0&rel=0&modestbranding=1"
		title="${slidesData[i].title}"
		allow="autoplay; encrypted-media"
		allowfullscreen>
	  </iframe>`;
		} else {
		  media.innerHTML = `<img src="https://img.youtube.com/vi/${slidesData[i].videoId}/hqdefault.jpg" alt="${slidesData[i].title}">`;
		}
	  });
	}

	// dịch track để slide active luôn nằm giữa viewport
	function updatePosition() {
	  const itemEl = items[activeIndex];
	  const viewportCenter = viewport.clientWidth / 2;
	  const itemCenter = itemEl.offsetLeft + itemEl.offsetWidth / 2;
	  const offset = viewportCenter - itemCenter;
	  track.style.transform = `translateX(${offset}px)`;

	  items.forEach((item, i) =>
		item.classList.toggle("is-active", i === activeIndex),
	  );
	  dots.forEach((dot, i) =>
		dot.classList.toggle("is-active", i === activeIndex),
	  );
	}

	function goTo(index) {
	  activeIndex = (index + slidesData.length) % slidesData.length;
	  updatePosition();
	  loadActiveVideo();
	}

	prevBtn.addEventListener("click", () => goTo(activeIndex - 1));
	nextBtn.addEventListener("click", () => goTo(activeIndex + 1));
	window.addEventListener("resize", updatePosition);

	// khởi tạo
	goTo(0);
  })();

  (function () {
	// 👉 thêm/bớt/ sửa item ở đây. image có thể thay bằng ảnh thumbnail thật hoặc link youtube thumbnail
	const kolData = [
	  {
		image: "https://placehold.co/400x380/8b7fc7/ffffff?text=VR+Review",
		caption: "Mr.VR - VR expert's Review",
	  },
	  {
		image:
		  "https://placehold.co/400x380/1a1a2e/ffffff?text=Iron+Man+AR",
		caption: "@Brains techKnowlogy's Review",
	  },
	  {
		image: "https://placehold.co/400x380/c9b79c/ffffff?text=XR+Glasses",
		caption: "@Cas and Chary XR's Review",
	  },
	  {
		image:
		  "https://placehold.co/400x380/4a4a4a/ffffff?text=Smart+Glasses",
		caption: "@TechDaily's Review",
	  },
	  {
		image:
		  "https://placehold.co/400x380/2d5f5f/ffffff?text=AR+Unboxing",
		caption: "@GadgetVN's Review",
	  },
	];

	const track = document.getElementById("kolTrack");
	const viewport = track.parentElement;
	const dotsWrap = document.getElementById("kolDots");
	const prevBtn = document.getElementById("kolPrevBtn");
	const nextBtn = document.getElementById("kolNextBtn");

	let activeIndex = 1; // mặc định lệch giữa giống mẫu (dot thứ 4 sáng)

	kolData.forEach((slide) => {
	  const item = document.createElement("div");
	  item.className = "kol-slide__item";
	  item.innerHTML = `
  <div class="kol-slide__media">
	<img src="${slide.image}" alt="${slide.caption}">
  </div>
  <div class="kol-slide__caption">${slide.caption}</div>
`;
	  track.appendChild(item);
	});
	const items = track.querySelectorAll(".kol-slide__item");

	kolData.forEach((_, i) => {
	  const dot = document.createElement("button");
	  dot.type = "button";
	  dot.className = "kol-slide__dot";
	  dot.addEventListener("click", () => goTo(i));
	  dotsWrap.appendChild(dot);
	});
	const dots = dotsWrap.querySelectorAll(".kol-slide__dot");

	function updatePosition() {
	  const itemEl = items[activeIndex];
	  const viewportCenter = viewport.clientWidth / 2;
	  const itemCenter = itemEl.offsetLeft + itemEl.offsetWidth / 2;
	  const offset = viewportCenter - itemCenter;
	  track.style.transform = `translateX(${offset}px)`;
	  dots.forEach((dot, i) =>
		dot.classList.toggle("is-active", i === activeIndex),
	  );
	}

	function goTo(index) {
	  activeIndex = Math.max(0, Math.min(kolData.length - 1, index));
	  updatePosition();
	}

	prevBtn.addEventListener("click", () => goTo(activeIndex - 1));
	nextBtn.addEventListener("click", () => goTo(activeIndex + 1));
	window.addEventListener("resize", updatePosition);

	goTo(activeIndex);
  })();
</script>

<?php
get_footer();
