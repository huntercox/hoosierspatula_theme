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

	// Font Awesome 5
		wp_register_style('font-awesome5', 'https://use.fontawesome.com/releases/v5.0.4/css/all.css', false, '5.0.2', null);
		wp_enqueue_style('font-awesome5');

	// SlickSlider Styles
		wp_register_style('slick', get_template_directory_uri() . '/assets/slick/slick.css', false, null);
		wp_enqueue_style('slick');

		// SlickSlider Theme
			wp_register_style('slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css', false, null);
			wp_enqueue_style('slick-theme');

	// Compiled CSS from SCSS
		wp_register_style('custom', get_template_directory_uri() . '/assets/css/global-styles.min.css', false, null);
		wp_enqueue_style('custom');



/*
-----------
 Scripts
-----------
*/
	// jQuery
		wp_register_script('jquery-3.2.1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '3.2.1', true);
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

	// Slick Slider
		wp_register_script('slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', false, null, true);
		wp_enqueue_script('slick-js');

	// CA Scripts
		wp_register_script('custom-js', get_template_directory_uri() . '/assets/js/global-scripts.min.js', false, null, true);
		wp_enqueue_script('custom-js');

}
add_action('wp_enqueue_scripts', 'enqueue_assets', 100);
