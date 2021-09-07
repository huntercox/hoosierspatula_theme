<!DOCTYPE html>
<html class="no-js">
<head>
  <title><?php wp_title('•', true, 'right'); bloginfo('name'); ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="Fl27XJjYEICFe4JRtsL2f_xlHl5qo9KWGIncx8_5l3o" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
// ==============================================================
// Header
// ==============================================================

	// Home pg. Header & Banner
		if ( is_front_page() ):
			$img_id = get_field('home_background');
			$img_size = 'home-background';
			$img_array = wp_get_attachment_image_src($img_id, $img_size);
			$img_url = $img_array[0];

			if ( $img_id ):
				echo '<header class="site-header home-background">';
					echo '<div class="site-header__home-banner" style="background-image: url('.$img_url.');"></div>';
			endif;

	// Default Header - if 'Featured Image' is set
		elseif( is_page() && !is_shop() && has_post_thumbnail()):
			$featured_size = 'banner';
			$featured_id = get_post_thumbnail_id();
			$featured_array = wp_get_attachment_image_src($featured_id, $featured_size);
			$featured_url = $featured_array[0];

			echo '<header class="site-header page-featured-image" style="background-image: url('.$featured_url.');">';
				echo '<div class="site-header__overlay"></div>';

	// Fallback Header - if no 'Featured Image' is set
		else:
			$fallback_id = get_field('fallback_banner', 'option');
			$fallback_size = 'banner';
			$fallback_array = wp_get_attachment_image_src($fallback_id, $fallback_size);
			$fallback_url = $fallback_array[0];

			echo '<header class="site-header page-fallback" style="background-image: url('.$fallback_url.');">';
				echo '<div class="site-header__overlay"></div>';
		endif;


	// ==============================================================
	// Logo
	// ==============================================================
			echo '<a class="site-header__brand" href="'.esc_url( home_url('/') ).'">';

				$logo_id = get_field('logo', 'option');

				if ( $logo_id ):
					$logo_size = 'medium';
					$logo_array = wp_get_attachment_image_src($logo_id, $logo_size);
					$logo_url = $logo_array[0];

					echo '<img class="site-header__logo" src="'.$logo_url.'" />';
				else:
					echo '<img class="site-header__logo--fallback" src="'.get_template_directory_uri().'/assets/img/original/logos/logo-medium-color.png" />';
				endif;
			echo '</a><!-- /.site-header__brand -->';

	// ==============================================================
	// Woo Cart
	// ==============================================================
			if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option( 'active_plugins'))) ):
		   	$count = wc()->cart->cart_contents_count;
				$cart_pg_url = get_permalink( wc_get_page_id( 'cart' ) );
				$cart_link_title = 'View your shopping cart';


				if ( $count > 0 ) {
					echo '<div class="woo-cart__wrap has-items">';
						echo '<a class="woo-cart__contents" href="'.$cart_pg_url.'" title="'.$cart_link_title.'">';
				      echo '<span class="woo-cart__count">'.esc_html( $count ).'</span>';
						echo '</a>';
					echo '</div>';
				} else {
						echo '<div class="woo-cart__wrap no-items">';
							echo '<a class="woo-cart__contents" href="'.$cart_pg_url.'" title="'.$cart_link_title.'">';
								echo '<span class="woo-cart__count--empty"></span>';
							echo '</a>';
						echo '</div>';
				}

			endif;

	// ==============================================================
	// Hamburger Menu - Mobile Nav Toggle
	// ==============================================================
?>
		<div class="site-header__mobile-nav-toggle">
			<button class="hamburger hamburger--spin" type="button">
			  <span class="hamburger-box">
			    <span class="hamburger-inner"></span>
			  </span>
			</button>
		</div><!-- /.site-header__mobile-nav-toggle -->

<?php
	// ==============================================================
	// Navigation Menu
	// ==============================================================
?>
		<nav class="site-header__nav">
			<?php
				wp_nav_menu( array(
					'theme_location'	=> 'basic-nav-menu',
					'container'       => false,
					'menu_class'		  => '',
					'fallback_cb'		  => '__return_false',
					'items_wrap'		  => '<ul id="%1$s" class="site-header__nav_list%2$s">%3$s</ul>',
					'depth'			      => 1,
					'walker'  	      => new basic_walker_nav_menu()
				) );
			?>
		</nav><!-- /.site-header__nav -->

</header><!-- /.site-header -->
