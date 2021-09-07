<?php

function enqueue_assets() {

/*
-----------
 Styles
-----------
*/
	// Bootstrap 4
		wp_register_style('bootstrap4', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.min.css', false, '4.0.0-beta.2', null);
		wp_enqueue_style('bootstrap4');


	// IcoMoon - FontAwesome 5 Pro
		wp_register_style('icomoon', get_template_directory_uri() . '/assets/css/icomoon.css', false, null);
		wp_enqueue_style('icomoon');

	// SlickSlider
		// Main Styles
			wp_register_style('slick', get_template_directory_uri() . '/assets/slick/slick.min.css', false, null);
			wp_enqueue_style('slick');
		// Theme Styles
			wp_register_style('slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.min.css', false, null);
			wp_enqueue_style('slick-theme');

		if ( is_front_page() || is_product() && has_term( 'spatulas', 'product_cat' ) ) {
			// Slick Lightbox
				wp_register_style('slick-lightbox', get_template_directory_uri() . '/assets/css/slick-lightbox.min.css', false, null);
				wp_enqueue_style('slick-lightbox');
		}

	// Compiled CSS from SCSS
		wp_register_style('custom', get_template_directory_uri() . '/assets/css/global-styles.min.css', false, null);
		wp_enqueue_style('custom');



/*
-----------
 Scripts
-----------
*/
	// jQuery
		// if ( !is_product() ) {
		// 	if ( !is_admin() ) {
		// 		wp_deregister_script('jquery');
		// 	}
		// }
		wp_register_script('jquery-3.2.1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '3.2.1', false);
		wp_enqueue_script('jquery-3.2.1');

	// Modernizr
		wp_register_script('modernizr',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, '2.8.3', true);
		wp_enqueue_script('modernizr');

	// Popper
		wp_register_script('popper',  'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', false, '1.12.3', true);
		wp_enqueue_script('popper');

	// Bootstrap 4 JS
		wp_register_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.min.js', false, '4.0.0-beta.2', true);
		wp_enqueue_script('bootstrap-js');


	// SlickSlider - Scripts
		wp_register_script('slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', false, null, true);
		wp_enqueue_script('slick-js');

		if ( is_front_page() ||	is_product() && has_term( 'spatulas', 'product_cat' ) ) {
			// Slick Lightbox
				wp_register_script('slick-lightbox-js', get_template_directory_uri() . '/assets/js/slick-lightbox.min.js', false, null, true);
				wp_enqueue_script('slick-lightbox-js');
		}

		if ( is_front_page() )	{
			// Home page - Slider &	Lightbox Initiation
				wp_register_script('home-sliderlightbox-js', get_template_directory_uri() . '/assets/js/home-sliderlightbox.min.js', false, null, true);
				wp_enqueue_script('home-sliderlightbox-js');
		}

		if ( is_product() && has_term( 'spatulas', 'product_cat' ) ) {
			// Spatula products Photo Gallery
				wp_register_script('spatulas-gallery-js', get_template_directory_uri() . '/assets/js/spatulas-gallery.min.js', false, null, true);
				wp_enqueue_script('spatulas-gallery-js');
		}

	// Instafeed.js
		wp_register_script('instafeed-js', get_template_directory_uri() . '/assets/js/instafeed.min.js', false, null, true);
		wp_enqueue_script('instafeed-js');

	// Custom Scripts
		wp_register_script('custom-js', get_template_directory_uri() . '/assets/js/global-scripts.min.js', false, null, true);
		wp_enqueue_script('custom-js');

}
add_action('wp_enqueue_scripts', 'enqueue_assets', 100);
