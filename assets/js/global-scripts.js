(function ($) {

	'use strict';

	$(document).ready(function() {

	// ==================================================================
	// Bootstrap Forms
	// ==================================================================
			$('select, input[type=text], input[type=email], input[type=tel], input[type=password], textarea').addClass('form-control');
			$('input[type=submit]').addClass('button');


	// ==================================================================
	// Mobile Navigation
	// ==================================================================
	    var $window = $(window);
			var hscWindowSize = null;

			var $hamburger  = $('.hamburger');
			var $navigation = $('.site-header__nav');

			// Check if window width is GREATER THAN 768px
				function checkWidth( hscWindowSize ) {
					var windowsize = $window.width();

					if (windowsize > 768) {
						hscWindowSize = true;

						// Show nav when resizing larger than 768px
							$navigation.show();

					} else {
						hscWindowSize = false;

						// Reset hamburger menu animation when resizing below 768px
							if ( $hamburger.hasClass('is-active') ) {
								$hamburger.removeClass('is-active');
							}

						$navigation.removeClass('slide');
					}
					return hscWindowSize;
	    	}

			// Check window width on page-load
				checkWidth();

			// Check window width on resize
				$(window).resize( function() {
					checkWidth();
				});


			// Animate Hamburger Menu & Open Mobile Nav
				$hamburger.on('click', function() {
					$(this).toggleClass('is-active');

					if ( ! $(this).hasClass('is-active') ) {
						$(this).off('mouseenter mouseleave');
					}

					$navigation.toggle(300);

					// if window IS bigger than 768px
						if ( hscWindowSize ) {
							$navigation.fadeToggle(400);
						} else {
							$navigation.toggleClass('slide');
						}
 				});


	// ==================================================================
	// Instafeed JS
	// ==================================================================

	// Integrate 'Instafeed' with 'SlickSlider'

		// Pull posts from Instagram
			var feed = new Instafeed({
				clientID: 'db536f7e459346d78e4a69c5accdfeec',
				get: 'user',
				userId: '7812945728',
				accessToken: '7812945728.db536f7.3ad0177e1f684d46be4af02f4ccfa0b6',
				limit: 12,
				sortBy: 'most-recent',
				resolution: 'standard_resolution',
				template: '<div class="instafeed__post"><div class="instafeed__image-crop"><img src="{{image}}" class="instafeed__image" /></div><p class="instafeed__caption">{{caption}}</p></div>',
				after: function() {
					// Initiate Slick Slider
						$('#instafeed').slick({
							autoplay: true,
							autoplaySpeed: 4000,
							infinite: true,
							slidesToShow: 1,
							slidesToScroll: 1,
							dots: false,
							arrows: true
						});
				}
			});
			feed.run();



	// ==================================================================
	// WooCommerce
	// ==================================================================

		// -------------------------------------------------
		// WooCommerce - Single Product
			$('.product-specifications__heading').on('click', function() {
				$(this).toggleClass('active');
				$(this).children('span').toggleClass('open');
				$('.product-specifications__content ul').slideToggle( 300 );
			});

		// -------------------------------------------------
		// WooCommerce Shipping Calculator Reveal
			// $('.shipping-calculator-button').click(function(event) {
			// 	event.preventDefault();
			// 	$('.shipping-calculator-form').slideToggle(400);
			// });



	});

}(jQuery));
