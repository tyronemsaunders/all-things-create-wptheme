// explicity click button
function toggleOffcanvasNav(e) {
	var pages = document.querySelectorAll('.offcanvas-page');
	// when clicking hamburger button in header
	document.querySelector('.header-menu-toggle-btn').onclick = function() {
		// close any open offcanvas pages
		closeOpenPages();
		//send site header to the back
		document.querySelector('.site-header').classList.remove('page-active');
		// slide the navigation menu in view
		document.querySelector('.offcanvas-nav').classList.toggle('is-active');
	};

	// when clicking close button on an open navigation
	document.querySelector('.offcanvas-nav-close-btn').onclick = function() {
		document.querySelector('.offcanvas-nav').classList.remove('is-active');
	};

	function closeOpenPages() {
		for (var i = 0; i < pages.length; i++) {
			pages[i].classList.remove('is-active');
		}
	}
}

//when clicking anywhere on the document except the open offcanvas element close the offcanvas element
function clickAwayOffcanvasNav(e) {
	var clickedTarget = document.querySelector('.offcanvas-nav').contains(e.target);
	var clickedToggle = document.querySelector('.header-menu-toggle-btn').contains(e.target);

		if (!clickedTarget && !clickedToggle) {
			document.querySelector('.offcanvas-nav').classList.remove('is-active');
		}
}

function toggleOffcanvasPage() {
	var orbit = document.querySelector('.orbit-container');
	orbit.firstElementChild.classList.add('is-active');
	//when clicking a header link close the offcanvas nav and close any active pages
	var links = document.querySelectorAll('.offcanvas-page-link');
	var pages = document.querySelectorAll('.offcanvas-page');

	for (var i = 0; i < links.length; i++) {
		if (document.addEventListener) {
			links[i].addEventListener('click', function(e) {
				handleLinkClick(e);
			});
		} else {
			links[i].attachEvent('onclick', function(e) {
				handleLinkClick(e);
			});
		}
	}

	function handleLinkClick(e) {
		// close open offcanvas nav
		document.querySelector('.offcanvas-nav').classList.remove('is-active');
		// close open offcanvas pages
		closeOpenPages();
		// bring site header to top
		document.querySelector('.site-header').classList.add('page-active');
		// open target offcanvas page
		document.querySelector('#' + e.target.dataset.link).classList.toggle('is-active');
	}

	function closeOpenPages() {
		for (var i = 0; i < pages.length; i++) {
			pages[i].classList.remove('is-active');
		}
	}
}

if (document.addEventListener) {
	document.addEventListener('DOMContentLoaded', function() {
		toggleOffcanvasNav();
		toggleOffcanvasPage();
	});
} else {
	window.attachEvent('onload', function() {
		toggleOffcanvasNav();
		toggleOffcanvasPage();
	});
}

if (document.addEventListener) {
	document.addEventListener('click', clickAwayOffcanvasNav);
} else {
	document.attachEvent('onclick', clickAwayOffcanvasNav);
}
