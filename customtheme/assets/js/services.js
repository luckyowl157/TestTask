document.addEventListener('DOMContentLoaded', function() {
	const serviceItems = document.querySelectorAll('.services-section .grid-list li');

	serviceItems.forEach(item => {
		item.addEventListener('click', function() {
			const img = this.querySelector('.service-icon');
			
			if (this.classList.contains('is-expanded')) {
				this.classList.remove('is-expanded');
				img.src = this.dataset.iconDefault;
			} else {
				serviceItems.forEach(i => {
					i.classList.remove('is-expanded');
					const icon = i.querySelector('.service-icon');
					icon.src = i.dataset.iconDefault;
				});
				
				this.classList.add('is-expanded');
				img.src = this.dataset.iconActive;
			}
		});
	});

	const navButtons = document.querySelectorAll('.service-nav-btn');
	const contentItems = document.querySelectorAll('.service-content-item');

	navButtons.forEach(button => {
		button.addEventListener('click', function() {
			const serviceIndex = this.dataset.service;
			const color = this.dataset.color;
			const iconActive = this.dataset.iconActive;
			navButtons.forEach(btn => {
				btn.classList.remove('active');
				btn.style.backgroundColor = '';
				const img = btn.querySelector('img');
				img.src = btn.dataset.iconDefault;
			});
			
			contentItems.forEach(item => item.classList.remove('active'));
			
			this.classList.add('active');
			this.style.backgroundColor = color;
			
			const img = this.querySelector('img');
			img.src = iconActive;
			
			const targetContent = document.querySelector(`.service-content-item[data-service="${serviceIndex}"]`);
			if (targetContent) {
				targetContent.classList.add('active');
			}
		});
	});
});