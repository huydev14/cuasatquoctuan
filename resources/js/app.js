import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
	const menuHamburger = document.querySelector('.menu-hamburger');
	const navLinks = document.querySelector('.nav-menu');
	const navIcon = menuHamburger?.querySelector('img');

	if (!menuHamburger || !navLinks) {
		return;
	}

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
});
