<?php

// ===================
// WooCommerce
// ===================


/*
=============================
GENERAL
=============================
*/
	// -------------------------------------------
	// Declare theme support
		function hsc2018_woocommerce_support() {
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
		add_action( 'after_setup_theme', 'hsc2018_woocommerce_support' );


	// -------------------------------------------
	// Remove breadcrumbs
		add_filter( 'woocommerce_before_main_content', 'remove_breadcrumbs');
		function remove_breadcrumbs() {
			remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
		}


/*
=============================
	CART
=============================
*/
	// -------------------------------------------
	// Ensure cart contents update when products are added to the cart via AJAX
		function my_header_add_to_cart_fragment( $fragments ) {
	    ob_start();
			global $woocommerce;
	    $count = $woocommerce->cart->cart_contents_count;

			$cart_pg_url = get_permalink( wc_get_page_id( 'cart' ) );
		  if ( $count > 0 ) {
				echo '<a class="woo-cart__contents has-items" href="'.$cart_pg_url.'" title="'._e( 'View your shopping cart' ).'">';
		      echo '<span class="woo-cart__count">'.esc_html( $count ).'</span>';
				echo '</a>';
		  } else {
					echo '<a class="woo-cart__contents" href="'.$cart_pg_url.'" title="'._e( 'View your shopping cart' ).'"></a>';
			}


		  $fragments['a.cart-contents'] = ob_get_clean();

		  return $fragments;
		}
		add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );


/*
=============================
	SHOP page
=============================
*/

	// -------------------------------------------
	// Add a <div> to wrap the product_thumbnail and add a <span> element
		remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
		remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
		add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

		function woocommerce_template_loop_product_thumbnail () {
			echo '<div class="woocommerce-loop-product__image-wrapper">';
				echo woocommerce_get_product_thumbnail();
				wc_get_template( 'loop/price.php' );
				echo '<span class="woocommerce-loop-product__image-wrapper_callout">Click for more info</span>';
			echo '</div>';
		}

	// -------------------------------------------
	// Change empty price
		function custom_empty_price( $price, $product ) {
			return __( '<span class="coming-soon">Coming Soon</span>', 'WooCommerce' ) ;
		}
		add_filter( 'woocommerce_variable_empty_price_html', 'custom_empty_price', 10, 2 );
		add_filter( 'woocommerce_empty_price_html', 'custom_empty_price', 10, 2 );




/*
=============================
	SINGLE-PRODUCT template
=============================
*/

	// -------------------------------------------
	// Remove 'Related Products'
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


	// -------------------------------------------
	// Remove 'Quantity', 'Add to Cart' and 'Price'
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);


	// -------------------------------------------
	// Add 'Quantity', 'Add to Cart' and 'Price' - above Description.php
		add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);
		add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);


	// -------------------------------------------
	// Remove 'Tabs' and 'Tab Headings'
		add_filter( 'woocommerce_product_tabs', 'remove_woocommerce_product_tabs', 98 );
		function remove_woocommerce_product_tabs( $tabs ) {
			unset( $tabs['description'] );
			unset( $tabs['reviews'] );
			unset( $tabs['additional_information'] );
			return $tabs;
		}


	// -------------------------------------------
	// Remove "Product Description" heading
		add_filter('woocommerce_product_description_heading', '__return_empty_string');


	// -------------------------------------------
	// Move 'Description' into 'Entry Summary', below
		function woocommerce_template_product_description() {
			echo '<div class="woocommerce-product-description">';
				wc_get_template( 'single-product/tabs/description.php' );
			echo '</div>';
		}
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 35 );




/*
=============================
	"APPAREL" CATEGORY, SINGLE-PRODUCT - template
=============================
*/
