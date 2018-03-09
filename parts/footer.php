<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="site-footer__form col-md-5">

			</div><!-- /.col-md-6 -->

			<div class="site-footer__nav col-md-3">

			</div><!-- /.col-md-3 -->

			<div class="site-footer__info col-md-4">
				<div class="row">

					<div class="col-8">
						<?php
							echo '<p class="site-footer__info_site-name">';
								echo bloginfo('name');
							echo '</p>';

							$phone = get_field('phone_number', 'option');
								if ($phone) { echo '<p class="site-footer__info_phone">'.$phone.'</p>'; }

							$email = get_field('email_address', 'option');
								if ($email) {
									echo '<p class="site-footer__info_email">';
										echo '<a href="mailto:'.$email.'">'.$email;
									echo '</a></p>';
								}
						?>
					</div><!-- /.col-9 -->

					<div class="col-4">
						<?php
							$address = get_field('office_location', 'option');
								if ($address) {
									echo '<p class="site-footer__info_address">';
										echo $address;
									echo '</p>';
								}
						?>
					</div><!-- /.col-3 -->


					<div class="col-4">
						<?php
							$img_id = get_field('brand_logo', 'option');
							$img_size = 'thumbnail';
								if( $img_id ) { echo wp_get_attachment_image( $img_id, $img_size ); }
						?>
					</div><!-- /.col-4 -->
					<div class="col-8">
						<?php
							if(have_rows('qualifications', 'option')) :
								while(have_rows('qualifications', 'option')) : the_row();
									$img_id = get_sub_field('image');
									$img_array = wp_get_attachment_image_src( $img_id, 'medium' );
									$img_url = $img_array[0];
										if( $img_id ) { echo '<img src="'.$img_url.'" alt="qualification" />'; }
								endwhile;
							endif;

						?>
					</div><!-- /.col-12 -->

				</div><!-- /.row -->
				<?php

				?>
			</div><!-- /.col-md-3 -->
		</div><!-- /.row -->
	</div><!-- /.container -->

	<div class="copyright container-fluid">
	  <div class="row">
	    <div class="col">
	      <p class="text-center">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
	    </div><!-- /.col -->
	  </div><!-- /.row -->
	</div><!-- /.copyright -->
</footer><!-- /.site-footer -->


<?php wp_footer(); ?>
</body>
</html>
