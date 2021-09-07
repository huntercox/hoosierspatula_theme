<?php get_template_part('parts/header'); ?>


<div class="content" role="main">
	<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<div class="home__intro">
	  <div class="home__intro_content">
	  	<?php
				$intro_text = get_field('intro');

		  	if ($intro_text) :
		  		echo $intro_text;
		  	endif;
			?>
	  </div><!-- /.intro-content -->
	</div><!-- /.home__intro -->

	<div class="container-fluid home__features">
		<div class="row">
			<div class="col-md-12 home__features_item">
				<div class="row">
					<div class="col-3 home__features_item-gif">
						<?php
							$img_id = get_field('feature_icon_1');
							$img_size = 'full';

							if( $img_id ) {
								echo wp_get_attachment_image( $img_id, $img_size );
							}
						?>
					</div><!-- /.col-3 -->

					<div class="col-9 align-self-stretch home__features_item-text">
						<?php
							$heading = get_field('feature_heading_1');
							if ($heading) :
								echo '<h2 class="home__features_item-text_heading">'.$heading.'</h2>';
							endif;

							$text = get_field('feature_description_1');
							if ($text) :
								echo '<p class="home__features_item-text_description">'.$text.'</p>';
							endif;
						?>
					</div><!-- /.col-9 -->
				</div><!-- /.row -->
			</div><!-- /.col-sm-12 col-md-6 -->


			<div class="col-md-12 home__features_item">
				<div class="row">
					<div class="col-3 home__features_item-gif">
						<?php
							$img_id = get_field('feature_icon_2');
							$img_size = 'full';

							if( $img_id ) {
								echo wp_get_attachment_image( $img_id, $img_size );
							}
						?>
					</div><!-- /.col-3 -->

					<div class="col-9 align-self-stretch home__features_item-text">
						<?php
							$heading = get_field('feature_heading_2');
							if ($heading) :
								echo '<h2 class="home__features_item-text_heading">'.$heading.'</h2>';
							endif;

							$text = get_field('feature_description_2');
							if ($text) :
								echo '<p class="home__features_item-text_description">'.$text.'</p>';
							endif;
						?>
					</div><!-- /.col-9 -->
				</div><!-- /.row -->
			</div><!-- /.col-sm-12 col-md-6 -->
		</div><!-- /.row -->
	</div><!-- /.container.home__features -->

	<div class="home__slider">
		<?php
			$acf_gallery = get_field('home_slider');
			$size = 'medium';

			if( $acf_gallery ):
				foreach( $acf_gallery as $image ): ?>
					<a href="<?php echo $image['url']; ?>">
            <img src="<?php echo $image['sizes']['medium']; ?>" />
          </a>
				<?php endforeach;
			endif;
		?>
	</div><!-- /.home__slider -->

	<div class="home__callout">
		<?php
			$callout_heading = get_field('callout_heading');
			if ($callout_heading) :
				echo '<h3 class="home__callout_heading">'.$callout_heading.'</h3>';
			endif;

			$link = get_field('callout_link');
				if ($link) {
					echo '<a class="home__callout_button" href="'.$link['url'].'">';
						echo $link['title'];
					echo '</a>';
				}
		?>
	</div><!-- /.home__callout -->

	<?php endwhile; endif; ?>
</div><!-- /.content -->

<?php get_template_part('parts/footer'); ?>
