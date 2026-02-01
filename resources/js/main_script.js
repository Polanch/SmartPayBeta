// Avatar upload: show file dialog and preview image
document.addEventListener('DOMContentLoaded', function() {
	const changePfpBtn = document.getElementById('change-pfp-btn');
	const avatarInput = document.getElementById('avatar-input');
	const mypfp = document.getElementById('mypfp');
	if (changePfpBtn && avatarInput && mypfp) {
		changePfpBtn.addEventListener('click', function(e) {
			e.preventDefault();
			avatarInput.click();
		});
		avatarInput.addEventListener('change', function() {
			if (this.files && this.files[0]) {
				const reader = new FileReader();
				reader.onload = function(e) {
					mypfp.src = e.target.result;
				};
				reader.readAsDataURL(this.files[0]);
			}
		});
	}
});
// Prevent form submission unless TOS and Privacy Policy are checked
document.addEventListener('DOMContentLoaded', function() {
	const settingForm = document.querySelector('form[action$="/student/setting/update"]');
	if (settingForm) {
		settingForm.addEventListener('submit', function(e) {
			const tos = document.getElementById('accept_tos');
			const privacy = document.getElementById('accept_privacy');
			if (!tos?.checked || !privacy?.checked) {
				e.preventDefault();
				alert('You must agree to the Terms and Conditions and Privacy Policy to proceed.');
			}
		});
	}
});

document.addEventListener('DOMContentLoaded', function() {
	// ...existing code...
	const menuBtn = document.querySelector('.menu-btn');
	const topNav = document.querySelector('.top-nav');

	// Menu button routing (HOME, CREDIT, TRANSACTIONS, SETTINGS, LOG OUT)
	const menuButtons = document.querySelectorAll('.menu button');
	const routes = [
		'/student/home',        // HOME
		'/student/credit',      // CREDIT
		'/student/transaction', // TRANSACTIONS
		'/student/setting',     // SETTINGS
		'/student/logout'       // LOG OUT (end session)
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
	// Lock switch AJAX toggle
	const lockSwitch = document.getElementById('lock-switch');
	if (lockSwitch) {
		lockSwitch.addEventListener('change', function() {
			const studentId = this.getAttribute('data-student-id');
			fetch('/student/toggle-lock', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
				},
				body: JSON.stringify({ student_id: studentId })
			})
			.then(response => response.json())
			.then(data => {
				if (!data.success) {
					alert('Failed to update lock status: ' + data.message);
					// Revert switch state
					lockSwitch.checked = !lockSwitch.checked;
				} else {
					// Optionally show a message or update UI
					// alert(data.message);
				}
			})
			.catch(() => {
				alert('Error updating lock status.');
				lockSwitch.checked = !lockSwitch.checked;
			});
		});
	}
});

// Alert window animation: slide down, stay, fade out
window.addEventListener('DOMContentLoaded', function() {
	const alertWindow = document.querySelector('.alert-window');
	if (alertWindow && alertWindow.innerHTML.trim() !== '') {
		alertWindow.classList.add('active');
		// Show for 2 seconds, then fade out on 3rd second
		setTimeout(() => {
			alertWindow.classList.add('fade-out');
			// After fade-out animation, hide the alert
			setTimeout(() => {
				alertWindow.classList.remove('active', 'fade-out');
				alertWindow.style.display = 'none';
			}, 500); // match fade-out duration in CSS
		}, 2500); // 2s visible + 0.5s slide = 2.5s, then fade
	}
});

// Payment method sliding logic
document.addEventListener('DOMContentLoaded', function() {
	const movingWindow = document.querySelector('.moving-window');
	const visaBtn = document.getElementById('visa-btn');
	const mastercardBtn = document.getElementById('mastercard-btn');
	const gcashBtn = document.getElementById('gcash-btn');
	const btns = [visaBtn, mastercardBtn, gcashBtn];

	function setActiveBtn(activeBtn) {
		btns.forEach(btn => {
			if (btn) btn.classList.remove('active');
		});
		if (activeBtn) activeBtn.classList.add('active');
	}

	if (movingWindow && visaBtn && mastercardBtn && gcashBtn) {
		visaBtn.addEventListener('click', function() {
			movingWindow.classList.add('visa-active');
			movingWindow.classList.remove('mastercard-active', 'gcash-active');
			setActiveBtn(visaBtn);
		});
		mastercardBtn.addEventListener('click', function() {
			movingWindow.classList.add('mastercard-active');
			movingWindow.classList.remove('visa-active', 'gcash-active');
			setActiveBtn(mastercardBtn);
		});
		gcashBtn.addEventListener('click', function() {
			movingWindow.classList.add('gcash-active');
			movingWindow.classList.remove('visa-active', 'mastercard-active');
			setActiveBtn(gcashBtn);
		});
		// Set initial active button
		setActiveBtn(visaBtn);
	}
});

