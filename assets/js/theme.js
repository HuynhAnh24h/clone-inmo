document.addEventListener('DOMContentLoaded', () => {
	// Intersection Observer for scroll animations
	const observerOptions = {
		root: null,
		rootMargin: '0px',
		threshold: 0.1
	};

	const observer = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.classList.add('is-visible');
			}
		});
	}, observerOptions);

	const animatedElements = document.querySelectorAll('.animate-fade-in, .animate-slide-up');
	animatedElements.forEach(el => observer.observe(el));

	// ---- FRONT PAGE LOGIC (Splide) ----
	const splideInnovative = document.getElementById("splide-innovative");
	if (splideInnovative && typeof Splide !== 'undefined') {
		const splide = new Splide(splideInnovative, {
			type       : 'loop',
			focus      : 'center',
			fixedWidth : '1200px',
			gap        : '20px',
			pagination : true,
			arrows     : true,
			breakpoints: {
				1400: { fixedWidth: '85vw' },
				768: { fixedWidth: '95vw', gap: '10px' }
			},
			classes: {
				pagination: 'splide__pagination theme-slide-dots',
				page: 'splide__pagination__page theme-slide-dots__dot',
			}
		});

		splide.on('mounted', function() {
			const pagination = splide.root.querySelector('.splide__pagination');
			const nav = splide.root.querySelector('.theme-slide-nav');
			if (pagination && nav) {
				const nextBtn = nav.querySelector('.splide__arrow--next');
				nav.insertBefore(pagination, nextBtn);
			}
		});

		splide.on('active', function(Slide) {
			Slide.slide.classList.add('is-active');
			const media = Slide.slide.querySelector('.theme-slide-item__media');
			const videoId = Slide.slide.getAttribute('data-video-id');
			if (media && videoId) {
				media.innerHTML = `<iframe src="https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&loop=1&playlist=${videoId}&controls=0&showinfo=0&rel=0&modestbranding=1" title="Video" allow="autoplay; encrypted-media" allowfullscreen></iframe>`;
			}
		});

		splide.on('inactive', function(Slide) {
			Slide.slide.classList.remove('is-active');
			const media = Slide.slide.querySelector('.theme-slide-item__media');
			const videoId = Slide.slide.getAttribute('data-video-id');
			if (media && videoId) {
				media.innerHTML = `<img src="https://img.youtube.com/vi/${videoId}/hqdefault.jpg" alt="Video">`;
			}
		});

		splide.mount();
	}

	const splideKol = document.getElementById("splide-kol");
	if (splideKol && typeof Splide !== 'undefined') {
		const splideK = new Splide(splideKol, {
			type       : 'loop',
			focus      : 'center',
			fixedWidth : '400px',
			gap        : '24px',
			pagination : true,
			arrows     : true,
			breakpoints: {
				768: {
					fixedWidth: '78vw'
				}
			},
			classes: {
				pagination: 'splide__pagination theme-kol-slide__dots',
				page: 'splide__pagination__page theme-kol-slide__dot',
			}
		});

		splideK.on('active', function(Slide) {
			Slide.slide.classList.add('is-active');
		});
		splideK.on('inactive', function(Slide) {
			Slide.slide.classList.remove('is-active');
		});

		splideK.mount();
	}

	// ---- ABOUT PAGE LOGIC ----
	const heroBars = document.getElementById('heroBars');
	if (heroBars) {
		for (let i = 0; i < 24; i++) {
			const span = document.createElement('span');
			heroBars.appendChild(span);
		}
	}

	// ---- SUPPORT PAGE LOGIC ----
	// JS rendering for Support page removed because it is now rendered by PHP

	// ---- SINGLE PRODUCT LOGIC ----
	const thumbs = document.querySelectorAll('.pg-thumbs img');
	const mainImage = document.getElementById('mainImage');
	if (thumbs.length > 0 && mainImage) {
		thumbs.forEach(img => {
			img.addEventListener('click', () => {
				mainImage.src = img.getAttribute('data-full');
				thumbs.forEach(t => t.classList.remove('is-active'));
				img.classList.add('is-active');
			});
		});
	}

	const accordionItems = document.querySelectorAll('.pg-accordion-item');
	accordionItems.forEach(head => {
		head.addEventListener('click', () => head.classList.toggle('is-open'));
	});

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

	const featureSmWrap = document.getElementById('featureSmWrap');
	if (featureSmWrap) {
		let featureSmData = window.acfProductData && window.acfProductData.featureSm ? window.acfProductData.featureSm : [
			{ title: 'Đệm Mũi Đệm Khí Êm Ái', image: 'https://placehold.co/260x210/1a1a1a/ffffff?text=Nose+Pads' },
			{ title: 'Gọng Kính Thích Ứng 15°', image: 'https://placehold.co/260x210/1a1a1a/ffffff?text=15°' },
			{ title: 'Sức Mạnh Trong 8mm Siêu Mỏng', image: 'https://placehold.co/260x210/1a1a1a/ffffff?text=8mm' },
			{ title: 'Hoàn Thiện Cao Cấp', image: 'https://placehold.co/260x210/1a1a1a/ffffff?text=Finish' },
			{ title: 'Bảo Mật Ưu Tiên', image: 'https://placehold.co/260x210/1a1a1a/ffffff?text=Privacy' }
		];
		if (!Array.isArray(featureSmData) || featureSmData.length === 0) featureSmData = [];
		featureSmData.forEach((f) => {
			const col = document.createElement('div');
			col.className = 'col-6 col-md';
			col.innerHTML = `<div class="pg-feature-sm"><img src="${f.image || f.img}" alt="${f.title}"><span>${f.title}</span></div>`;
			featureSmWrap.appendChild(col);
		});
	}

	const featureLgWrap1 = document.getElementById('featureLgWrap1');
	if (featureLgWrap1) {
		let featureLgData1 = window.acfProductData && window.acfProductData.featureLg1 ? window.acfProductData.featureLg1 : [
			{ title: 'Màn Hình Đơn Sắc Hiển Thị Kép', image: 'https://placehold.co/500x260/1a1a1a/ffffff?text=Display' },
			{ title: 'Thoải mái cả ngày, thiết kế siêu nhẹ', image: 'https://placehold.co/500x260/1a1a1a/ffffff?text=Comfort' },
			{ title: 'Trợ lý AI điều khiển bằng giọng nói, học hỏi theo thói quen', image: 'https://placehold.co/500x260/1a1a1a/ffffff?text=AI' }
		];
		if (!Array.isArray(featureLgData1) || featureLgData1.length === 0) featureLgData1 = [];
		featureLgData1.forEach((f) => {
			const col = document.createElement('div');
			col.className = 'col-md-4';
			col.innerHTML = `<div class="pg-feature-lg"><img src="${f.image || f.img}" alt="${f.title}"><span>${f.title}</span></div>`;
			featureLgWrap1.appendChild(col);
		});
	}

	const featureLgWrap2 = document.getElementById('featureLgWrap2');
	if (featureLgWrap2) {
		let featureLgData2 = window.acfProductData && window.acfProductData.featureLg2 ? window.acfProductData.featureLg2 : [
			{ title: 'Dịch thuật AI, hỗ trợ 98+ ngôn ngữ', image: 'https://placehold.co/380x260/1a1a1a/ffffff?text=Translate' },
			{ title: 'Đổi pin trong 5 giây, thời lượng pin cả ngày', image: 'https://placehold.co/380x260/1a1a1a/ffffff?text=Battery' },
			{ title: 'Máy nhắc chữ + Tự động tóm tắt cuộc họp', image: 'https://placehold.co/380x260/1a1a1a/ffffff?text=Teleprompter' },
			{ title: 'Điều hướng AR, rảnh tay, không cần điện thoại', image: 'https://placehold.co/380x260/1a1a1a/ffffff?text=Navigation' }
		];
		if (!Array.isArray(featureLgData2) || featureLgData2.length === 0) featureLgData2 = [];
		featureLgData2.forEach((f) => {
			const col = document.createElement('div');
			col.className = 'col-6 col-md-3';
			col.innerHTML = `<div class="pg-feature-lg"><img src="${f.image || f.img}" alt="${f.title}"><span>${f.title}</span></div>`;
			featureLgWrap2.appendChild(col);
		});
	}

	const testiWrap = document.getElementById('testiWrap');
	if (testiWrap) {
		let testiData = window.acfProductData && window.acfProductData.testimonials ? window.acfProductData.testimonials : [
			{ author: 'Tyriel Wood - VR Tech', quote: 'Ý tưởng này nên được sao chép. INMO Go3', image: 'https://placehold.co/300x400/1a1a1a/ffffff?text=Tyriel' },
			{ author: 'CKid', quote: 'Chiếc kính thông minh thực sự mang lại ý nghĩa | INMO GO3', image: 'https://placehold.co/300x400/1a1a1a/ffffff?text=CKid' },
			{ author: 'Unbox Therapy', quote: 'Hiểu hầu hết mọi loại ngôn ngữ...', image: 'https://placehold.co/300x400/1a1a1a/ffffff?text=Unbox' },
			{ author: 'Steven Sullivan', quote: 'Kính thông minh điều hướng giá cả phải chăng nhất', image: 'https://placehold.co/300x400/1a1a1a/ffffff?text=Steven' },
			{ author: 'Jose Tecnofanatico', quote: "Kính thông minh Inmo Go 2 với Pin tháo rời / Tuyệt vời!", image: 'https://placehold.co/300x400/1a1a1a/ffffff?text=Jose' }
		];
		if (!Array.isArray(testiData) || testiData.length === 0) testiData = [];
		testiData.forEach((t) => {
			const col = document.createElement('div');
			col.className = 'col-6 col-md';
			col.innerHTML = `
				<div class="pg-testi-card">
					<img src="${t.image || t.img}" alt="${t.author || t.name}">
					<div class="pg-testi-play"><i class="bi bi-play-fill"></i></div>
				</div>
				<div class="pg-testi-name">${t.author || t.name}</div>
				<div class="pg-testi-quote">${t.quote}</div>
			`;
			testiWrap.appendChild(col);
		});
	}

	// ---- PROMO MODAL LOGIC ----
	const promoModalOverlay = document.getElementById('promoModalOverlay');
	const promoModalClose = document.getElementById('promoModalClose');
	const promoStickyBtn = document.getElementById('promoStickyBtn');

	if (promoModalOverlay && promoModalClose && promoStickyBtn) {
		setTimeout(() => {
			promoModalOverlay.classList.add('is-open');
			promoStickyBtn.classList.remove('is-visible');
		}, 1000);

		const closeModal = () => {
			promoModalOverlay.classList.remove('is-open');
			promoStickyBtn.classList.add('is-visible');
		};

		promoModalClose.addEventListener('click', closeModal);
		promoModalOverlay.addEventListener('click', (e) => {
			if(e.target === promoModalOverlay) closeModal();
		});

		promoStickyBtn.addEventListener('click', () => {
			promoModalOverlay.classList.add('is-open');
			promoStickyBtn.classList.remove('is-visible');
		});
	}

	// ---- AJAX SEARCH LOGIC ----
	const searchInput = document.getElementById('offcanvasSearchInput');
	const searchResults = document.getElementById('ajaxSearchResults');
	let searchTimeout = null;

	if (searchInput && searchResults && typeof inmo_ajax !== 'undefined') {
		searchInput.addEventListener('input', function() {
			const searchTerm = this.value.trim();
			
			if (searchTimeout) {
				clearTimeout(searchTimeout);
			}

			if (searchTerm.length < 2) {
				searchResults.innerHTML = '';
				return;
			}

			searchResults.innerHTML = '<div class="text-center py-4"><div class="spinner-border spinner-border-sm text-secondary" role="status"></div><span class="ms-2 text-muted">Đang tìm kiếm...</span></div>';

			searchTimeout = setTimeout(() => {
				const formData = new FormData();
				formData.append('action', 'inmo_ajax_search');
				formData.append('s', searchTerm);

				fetch(inmo_ajax.ajax_url, {
					method: 'POST',
					body: formData
				})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						searchResults.innerHTML = data.data;
					}
				})
				.catch(error => {
					searchResults.innerHTML = '<div class="text-center py-3 text-danger">Có lỗi xảy ra, vui lòng thử lại.</div>';
					console.error('Search error:', error);
				});
			}, 500); // 500ms debounce
		});
	}
});
// ================= AJAX FORMS =================
document.addEventListener('DOMContentLoaded', function() {
    var ajaxurl = (typeof inmo_ajax !== 'undefined') ? inmo_ajax.ajax_url : '/wp-admin/admin-ajax.php';

    // 1. Contact Form
    var contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var btn = contactForm.querySelector('button[type="submit"]');
            var res = document.getElementById('contactResponse');
            btn.innerHTML = 'Đang gửi...';
            btn.disabled = true;

            var formData = new FormData(contactForm);
            formData.append('action', 'inmo_submit_contact_form');

            fetch(ajaxurl, {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                res.style.display = 'block';
                if (data.success) {
                    res.style.backgroundColor = '#e6f4ea';
                    res.style.color = '#137333';
                    res.innerHTML = data.data;
                    contactForm.reset();
                } else {
                    res.style.backgroundColor = '#fce8e6';
                    res.style.color = '#c5221f';
                    res.innerHTML = data.data;
                }
            }).catch(error => {
                res.style.display = 'block';
                res.style.backgroundColor = '#fce8e6';
                res.style.color = '#c5221f';
                res.innerHTML = 'Lỗi kết nối. Vui lòng thử lại sau.';
            }).finally(() => {
                btn.innerHTML = 'Gửi tin nhắn';
                btn.disabled = false;
            });
        });
    }

    // 2. Discount Forms
    var discountForms = [document.getElementById('discountFormHome'), document.getElementById('discountFormFooter')];
    discountForms.forEach(function(form) {
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var btn = form.querySelector('button[type="submit"]');
                var res = form.querySelector('.discountResponse');
                var originalBtnHtml = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-hourglass-split"></i>';
                btn.disabled = true;

                var formData = new FormData(form);
                formData.append('action', 'inmo_submit_discount_form');

                fetch(ajaxurl, {
                    method: 'POST',
                    body: formData
                }).then(response => response.json()).then(data => {
                    res.style.display = 'block';
                    if (data.success) {
                        res.style.color = '#28a745'; // Green for success
                        res.innerHTML = data.data;
                        form.reset();
                    } else {
                        res.style.color = '#dc3545'; // Red for error
                        res.innerHTML = data.data;
                    }
                }).catch(error => {
                    res.style.display = 'block';
                    res.style.color = '#dc3545';
                    res.innerHTML = 'Lỗi kết nối. Vui lòng thử lại sau.';
                }).finally(() => {
                    btn.innerHTML = originalBtnHtml;
                    btn.disabled = false;
                });
            });
        }
    });
});
