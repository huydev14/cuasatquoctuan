import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Scroll Animation System
const animateOnScroll = () => {
	const elements = document.querySelectorAll('[data-animate]');

	const observer = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				const animationType = entry.target.getAttribute('data-animate');
				const delay = parseInt(entry.target.getAttribute('data-delay') || '0');

				setTimeout(() => {
					entry.target.classList.add('animate-in');
					entry.target.style.animation = `${animationType} 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards`;
					entry.target.style.opacity = '1';
				}, delay);

				observer.unobserve(entry.target);
			}
		});
	}, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

	elements.forEach(el => observer.observe(el));
};

// Add keyframe animations
const style = document.createElement('style');
style.textContent = `
	@keyframes fadeInUp {
		from {
			opacity: 0;
			transform: translateY(20px);
		}
		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}

	@keyframes slideInLeft {
		from {
			opacity: 0;
			transform: translateX(-30px);
		}
		to {
			opacity: 1;
			transform: translateX(0);
		}
	}

	@keyframes slideInRight {
		from {
			opacity: 0;
			transform: translateX(30px);
		}
		to {
			opacity: 1;
			transform: translateX(0);
		}
	}

	@keyframes scaleIn {
		from {
			opacity: 0;
			transform: scale(0.95);
		}
		to {
			opacity: 1;
			transform: scale(1);
		}
	}

	[data-animate] {
		opacity: 0;
	}
`;
document.head.appendChild(style);

document.addEventListener('DOMContentLoaded', () => {
	// Mobile Menu Toggle
	const menuHamburger = document.querySelector('.menu-hamburger');
	const navLinks = document.querySelector('.nav-menu');
	const navIcon = menuHamburger?.querySelector('img');

	if (menuHamburger && navLinks) {
		menuHamburger.addEventListener('click', () => {
			const isOpen = navLinks.classList.contains('translate-x-0');

			navLinks.classList.toggle('translate-x-full', isOpen);
			navLinks.classList.toggle('opacity-0', isOpen);
			navLinks.classList.toggle('pointer-events-none', isOpen);
			navLinks.classList.toggle('translate-x-0', !isOpen);
			navLinks.classList.toggle('opacity-100', !isOpen);
			navLinks.classList.toggle('pointer-events-auto', !isOpen);
			menuHamburger.setAttribute('aria-expanded', String(!isOpen));

			if (navIcon) {
				navIcon.classList.toggle('rotate-90', !isOpen);
			}
		});
	}

	// Initialize scroll animations
	animateOnScroll();
});
