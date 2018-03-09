/*
 * b4st 1.9.1
 */

(function ($) {

	'use strict';

	$(document).ready(function() {

		// Forms
			$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
			$('input[type=submit]').addClass('btn btn-primary');

		// Front Page - Slick Slider
			$('.banner__slider_wrap').slick({
				infinite: true,
				dots: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				speed: 1000
			});

	});

}(jQuery));
