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
				// Optional: stop observing after it becomes visible
				// observer.unobserve(entry.target);
			}
		});
	}, observerOptions);

	// Select all elements with animation classes
	const animatedElements = document.querySelectorAll('.animate-fade-in, .animate-slide-up');
	animatedElements.forEach(el => observer.observe(el));
});
