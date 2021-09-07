<?php get_template_part('parts/header'); ?>

<main class="container">
  <div class="row">
		<div class="col-12">
      <div class="content" role="main">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
				  <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
				    <header>
				      <h1 class="page-title"><?php the_title(); ?></h1>
				    </header>
						<?php the_content(); ?>

						<div class="row">
							<div class="col-sm-10 col-md-7 col-lg-8 contact__form">
								<?php the_field('contact_form_shortcode'); ?>
							</div>

							<div class="col-md-5 col-lg-4 contact__info">
								<?php
									$tagline = get_field('tagline', 'option');
										if ($tagline) {
											echo '<p class="site-footer__info_tagline">';
												echo $tagline;
											echo '</p>';
										} else {
											echo '<p class="site-footer__info_tagline">Hoosier Spatula LLC</p>';
										}

									// Address / Location
										echo '<address class="site-footer__info_address">';
											echo '<i class="ico-map-pin"></i>';
											echo the_field('address', 'option');
										echo '</address>';

									$phone = get_field('phone_number', 'option');
										if ($phone) {
											echo '<p class="site-footer__info_phone">';
												echo '<i class="ico-phone"></i>';
												echo $phone;
											echo '</p>';
										}

									$email = get_field('email_address', 'option');
										if ($email) {
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
							</div>
						</div>

				  </article>
				<?php endwhile; endif; ?>
      </div><!-- /#content -->
    </div><!-- /.col-sm-10 -->
  </div><!-- /.row -->
</main><!-- /.container -->

<?php get_template_part('parts/footer'); ?>
