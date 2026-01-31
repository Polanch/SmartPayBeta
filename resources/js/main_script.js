
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
		'/'                     // LOG OUT (redirect to welcome, or implement logout)
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

