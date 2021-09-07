<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="site-footer__info col-12 col-sm-9 col-md-8 col-lg-4">
				<?php
					$tagline = get_field('tagline', 'option');
						if ( $tagline ) {
							echo '<p class="site-footer__info_tagline">';
								echo $tagline;
							echo '</p>';
						} else {
							echo '<p class="site-footer__info_tagline">Longer is Better!</p>';
						}

					// Address / Location
						echo '<address class="site-footer__info_address">';
							echo '<i class="ico-map-pin"></i>';
							echo the_field('address', 'option');
						echo '</address>';

					$phone = get_field('phone_number', 'option');
						if ( $phone ) {
							echo '<p class="site-footer__info_phone">';
								echo '<i class="ico-phone"></i>';
								echo $phone;
							echo '</p>';
						}

					$email = get_field('email_address', 'option');
						if ( $email ) {
							echo '<p class="site-footer__info_email">';
								echo '<i class="ico-paper-plane"></i>';
								echo '<a href="mailto:'.$email.'">'.$email;
							echo '</a></p>';
						}

					$instagram = get_field('instagram_profile', 'option');
					$facebook = get_field('facebook_profile', 'option');

					if ( $facebook || !instagram ):
						echo '<ul class="site-footer__info_social-links">';
							if ( $facebook ) {
								echo '<li class="site-footer__info_social-links_facebook">';
									echo '<a href="'.$facebook.'" target="_blank">';
										echo '<i class="ico-facebook-square"></i>';
								echo '</a></li>';
							}
							if ( $instagram ) {
								echo '<li class="site-footer__info_social-links_instagram">';
									echo '<a href="'.$instagram.'" target="_blank">';
										echo '<i class="ico-instagram"></i>';
								echo '</a></li>';
							}
						echo '</ul>';
					endif;

				?>
			</div><!-- /.site-footer__info -->


			<div class="site-footer__feed col-lg-5">
				<div id="instafeed"></div>
			</div><!-- /.site-footer__feed -->


			<div class="site-footer__nav col-12 col-sm-3 col-md-4 col-lg-3">
				<?php
					wp_nav_menu( array(
						'theme_location'	=> 'footer-nav-menu',
						'container'       => false,
						'menu_class'		  => '',
						'fallback_cb'		  => '__return_false',
						'items_wrap'		  => '<ul id="%1$s" class="site-footer__nav_list%2$s">%3$s</ul>',
						'depth'			      => 1,
						'walker'  	      => new basic_walker_nav_menu()
					) );
				?>
			</div><!-- /.site-footer__contact-form -->
		</div><!-- /.row -->
	</div><!-- /.container -->


	<div class="bottom-footer">
		<div class="bottom-footer__copyright">
			<p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
		</div><!-- /.bottom-footer__copyright -->

		<div class="bottom-footer__links-wrap">
			<?php
				wp_nav_menu( array(
					'theme_location'	=> 'bottom-links',
					'container'       => false,
					'menu_class'		  => '',
					'fallback_cb'		  => '__return_false',
					'items_wrap'		  => '<ul id="%1$s" class="bottom-footer__links%2$s">%3$s</ul>',
					'depth'			      => 1,
					'walker'  	      => new basic_walker_nav_menu()
				) );
			?>
		</div><!-- /.bottom-footer__links-wrap -->
	</div><!-- /.bottom-footer -->

</footer><!-- /.site-footer -->


<?php wp_footer(); ?>
</body>
</html>
