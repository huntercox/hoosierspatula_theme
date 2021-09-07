(function ($) {

	'use strict';

	$(document).ready(function() {

		// Spatulas - Slick Lightbox
			 $('.product__spatula-gallery').slickLightbox();


		// Spatulas - Slick Slider
			$('.product__spatula-gallery').slick({
				mobileFirst: true,
				slidesToScroll: 1,
				slidesToShow: 1,
				arrow: true,
				dots: false,
				autoplay: false,
				infinite: true,
				responsive: [
					{
						breakpoint: 991,
						settings: "unslick"
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 574,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							arrow: false,
							dots: true,
							infinite: false
						}
					}
				]
			});



	});

}(jQuery));
