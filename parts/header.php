<!DOCTYPE html>
<html class="no-js">
<head>
  <title><?php wp_title('•', true, 'right'); bloginfo('name'); ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
	<div class="container">
		<div class="row">

			<div class="col-4">
				<?php
					$img_id = get_field('brand_logo', 'option');
					$img_size = 'medium';

					if( $img_id ) {
						echo '<a class="site-header__brand" href="'.esc_url( home_url('/') ).'">';
							echo wp_get_attachment_image( $img_id, $img_size );
						echo '</a><!-- /.site-header__brand -->';
					}
				?>

			</div><!-- /.col-4 -->

			<div class="col-8">
				<div class="site-header__contact-info">

				</div><!-- /.site-header__contact-info -->

				<nav class="site-header__nav">
					<?php
						wp_nav_menu( array(
							'theme_location'	=> 'main-nav',
							'container'       => false,
							'menu_class'		  => '',
							'fallback_cb'		  => '__return_false',
							'items_wrap'		  => '<ul id="%1$s" class="site-header__nav_list%2$s">%3$s</ul>',
							'depth'			      => 2,
							'walker'  	      => new bootstrap4_walker_nav_menu()
						) );
					?>
				</nav><!-- /.site-header__nav -->
			</div><!-- /.col-8 -->

		</div><!-- /.row -->
	</div><!-- /.container -->
</header><!-- /.site-header -->


<?php
	if ( is_front_page() ) {

		if(have_rows('banner_slider')) :
			echo '<div class="banner__slider_wrap">';
			while(have_rows('banner_slider')) : the_row();
				$img_id = get_sub_field('slide_image');
				$img_size = 'banner';
				$img_array = wp_get_attachment_image_src($img_id, $img_size);
				$img_url = $img_array[0];

				echo '<div class="banner__slider_image" style="background-image: url('.$img_url.');"></div>';
			endwhile;
			echo '</div>';
		endif;

	} else {

		$img_size = 'banner';
		$img_id = get_post_thumbnail_id();
		$img_array = wp_get_attachment_image_src($img_id, $img_size);
		$img_url = $img_array[0];

			echo '<div class="banner__image" style="background-image: url('.$img_url.');"></div>';

	}

?>
