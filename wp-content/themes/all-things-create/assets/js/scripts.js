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



////////////////////////////////////////////////////////////////////////////
//                             classList                                  //
// Source: https://gist.github.com/k-gun/c2ea7c49edf7b757fe9561ba37cb19ca //
////////////////////////////////////////////////////////////////////////////

// Immediately-Invoked Function Expression (IIFE)
(function() {
    // helpers
    var regExp = function(name) {
        return new RegExp('(^| )'+ name +'( |$)');
    };
    var forEach = function(list, fn, scope) {
        for (var i = 0; i < list.length; i++) {
            fn.call(scope, list[i]);
        }
    };

    // class list object with basic methods
    function ClassList(element) {
        this.element = element;
    }

    ClassList.prototype = {
        add: function() {
            forEach(arguments, function(name) {
                if (!this.contains(name)) {
                    this.element.className += this.element.className.length > 0 ? ' ' + name : name;
                }
            }, this);
        },
        remove: function() {
            forEach(arguments, function(name) {
                this.element.className =
                    this.element.className.replace(regExp(name), '');
            }, this);
        },
        toggle: function(name) {
            return this.contains(name)
                ? (this.remove(name), false) : (this.add(name), true);
        },
        contains: function(name) {
            return regExp(name).test(this.element.className);
        },
        // bonus..
        replace: function(oldName, newName) {
            this.remove(oldName), this.add(newName);
        }
    };

    // IE8/9, Safari
    if (!('classList' in Element.prototype)) {
        Object.defineProperty(Element.prototype, 'classList', {
            get: function() {
                return new ClassList(this);
            }
        });
    }

    // replace() support for others
    if (window.DOMTokenList && DOMTokenList.prototype.replace == null) {
        DOMTokenList.prototype.replace = ClassList.prototype.replace;
    }
})();

//http://stackoverflow.com/questions/11661187/form-serialize-javascript-no-framework
(function() {
	'use strict';

	var serializeForm = function(form) {
	    var field;
	    var s = [];
	    var o = {};
	    if (typeof form == 'object' && form.nodeName == "FORM") {
	        // loop through form element
	        for (var i = 0; i < form.elements.length; i++) {
	            // current form element
	        	field = form.elements[i];

	            if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {
	                if (field.type == 'select-multiple') {
	                	// object value is an array
	                	o[field.name] = [];

	                    for (var j = form.elements[i].options.length - 1; j >= 0; j--) {
	                        if (field.options[j].selected) {
	                        	s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
	                        	o[field.name].push(field.options[j].value);
	                        }
	                    }

	                } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
	                    s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
	                    o[field.name] = field.value;
	                }
	            }
	        }

	        return {
	        	str: s.join('&').replace(/%20/g, '+'),
	        	obj: o
	        };

	    } else {
	    	// return a blank string if form is not a form element
	    	return '';
	    }
	};

	// make tabs function available on the window object in the global namespace
	window.serializeForm = serializeForm;
})();
