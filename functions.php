<?php

// -------------
// Functions
// -------------
		require get_template_directory() . '/functions/remove-query-string.php';
		require get_template_directory() . '/functions/limit-output.php';
		require get_template_directory() . '/functions/cleanup.php';
		require get_template_directory() . '/functions/basic-nav.php';
		require get_template_directory() . '/functions/enqueues.php';
		require get_template_directory() . '/functions/woo-functions.php';


// -------------
// Default Settings
// -------------
		function default_theme_settings() {
			add_editor_style('assets/css/editor-style.css');
			add_theme_support('post-thumbnails');

			update_option('thumbnail_size_w', 170);
			update_option('medium_size_w', 470);
			update_option('large_size_w', 970);
		}
		add_action('init', 'default_theme_settings');


// -------------
// Register Custom Sizes
// -------------
	// Home page background image
		add_image_size( 'home-background', 1600, 700, true );
	// Banner 'featured images'
		add_image_size( 'banner', 1200, 300, false );
	// Gallery Images
		add_image_size( 'gallery', 400, 300, true );


// -------------
// Add Custom Sizes to Media Uploader
// -------------
	add_filter( 'image_size_names_choose', 'custom_image_sizes' );

	function custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
			'banner' => __( 'Banner' ),
			'gallery' => __( 'Gallery' )
		) );
	}


// -------------
// Prevent tags in WYSIWYG when pasting
// -------------
	add_filter('tiny_mce_before_init', 'customize_tinymce');

	function customize_tinymce($in) {
	  $in['paste_preprocess'] = "function(pl,o){ o.content = o.content.replace(/p class=\"p[0-9]+\"/g,'p'); o.content = o.content.replace(/span class=\"s[0-9]+\"/g,'span'); }";
	  return $in;
	}


// -------------
// ACF Options pages
// -------------
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Site Options',
			'menu_title'	=> 'Site Options',
			'menu_slug' 	=> 'acf-site-options',
			'capability'	=> 'edit_posts',
			'redirect'		=> true
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Branding',
			'menu_title'	=> 'Branding',
			'parent_slug'	=> 'acf-site-options'
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Contact Info',
			'menu_title'	=> 'Contact Info',
			'parent_slug'	=> 'acf-site-options'
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Product Defaults',
			'menu_title'	=> 'Products',
			'parent_slug'	=> 'acf-site-options'
		));
	}


// -------------
// Add Category for 'Policy' pages
// -------------
// Register Custom Taxonomy
	function page_categories() {

		$labels = array(
			'name'                       => 'Categories',
			'singular_name'              => 'Category',
			'menu_name'                  => 'Page Categories',
			'all_items'                  => 'All Page Categories',
			'parent_item'                => 'Parent Category',
			'parent_item_colon'          => 'Parent Category:',
			'new_item_name'              => 'New Category Name',
			'add_new_item'               => 'Add New Category',
			'edit_item'                  => 'Edit Category',
			'update_item'                => 'Update Category',
			'view_item'                  => 'View Category',
			'separate_items_with_commas' => 'Separate categories with commas',
			'add_or_remove_items'        => 'Add or remove categories',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular categories',
			'search_items'               => 'Search Categories',
			'not_found'                  => 'Not Found',
			'no_terms'                   => 'No categories',
			'items_list'                 => 'Categories list',
			'items_list_navigation'      => 'Categories list navigation',
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => false,
		);
		register_taxonomy( 'page_category', array( 'page' ), $args );

	}
	add_action( 'init', 'page_categories', 0 );
