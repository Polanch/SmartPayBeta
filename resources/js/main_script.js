
document.addEventListener('DOMContentLoaded', function() {
	const menuBtn = document.querySelector('.menu-btn');
	const topNav = document.querySelector('.top-nav');

	// Menu button routing
	const menuButtons = document.querySelectorAll('.menu button');
	const routes = [
		'/student/home',
		'/student/transaction',
		'/student/notification',
		'/student/profile',
		'/student/setting'
	];

	menuButtons.forEach((btn, idx) => {
		btn.addEventListener('click', function() {
			window.location.href = routes[idx];
		});
	});

	if (menuBtn && topNav) {
		menuBtn.addEventListener('click', function() {
			if (window.innerWidth <= 600) {
				topNav.style.right = topNav.style.right === '0px' ? '-250px' : '0px';
			}
		});

		document.addEventListener('click', function(e) {
			if (window.innerWidth <= 600) {
				// If nav is open and click is outside nav and menuBtn
				if (topNav.style.right === '0px' && !topNav.contains(e.target) && e.target !== menuBtn) {
					topNav.style.right = '-250px';
				}
			}
		});
	}
});
