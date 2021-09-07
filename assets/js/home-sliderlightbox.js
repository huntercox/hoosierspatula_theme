(function ($) {

	'use strict';

	$(document).ready(function() {

		// -------------------------------------------------
		// Home pg. - Slick Slider
			$('.home__slider').slick({
				infinite: true,
				arrows: false,
				dots: true,
				slidesToShow: 4,
				slidesToScroll: 1,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 3
						}
					},
					{
						breakpoint: 575,
						settings: {
							slidesToShow: 2
						}
					},
					{
						breakpoint: 375,
						settings: {
							slidesToShow: 1
						}
					}
				]
			});

		// -------------------------------------------------
		// Home pg. - Slick Lightbox wrapper
			$('.home__slider').slickLightbox();


	});

}(jQuery));
