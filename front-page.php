<?php get_template_part('parts/header'); ?>


<div id="content" role="main">
	<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<div class="container">
  	<div class="row justify-content-center">
			<div class="col-8">
				  <div class="intro-content">
				  	<?php the_content(); ?>
				  </div><!-- /.intro-content -->
			</div><!-- /.col-12 -->
  	</div><!-- /.row -->
	</div><!-- /.container -->

	<div class="properties">
		<h2>Our Properties</h2>

		<div class="container">
			<div class="row">
				<?php
					$args = array(
						'post_type' => 'properties',
						'posts_per_page' => -1
					);
					$properties = new WP_Query( $args );
					if ( $properties->have_posts() ) :
						while ( $properties->have_posts() ) : $properties->the_post();

						$img_id = get_post_thumbnail_id();
						$img_array = wp_get_attachment_image_src( $img_id, 'medium' );
						$img_url = $img_array[0];
					?>

						<div class="property col-sm-12 col-md" style="background-image: url(<?php echo $img_url; ?>)">
							<div class="property__overlay">
								<h3 class="property__title"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
							</div><!-- /.property__overlay -->
						</div><!-- /.col-sm-12 col-md-4 -->

					<?php
						endwhile;
							wp_reset_postdata();
						else :
					endif;
				?>
			</div><!-- /.row -->
		</div><!-- /.container -->

		<a href="<?php echo get_permalink(8); ?>" class="properties__callout button">See all KDC properties</a>
	</div><!-- /.properties -->

	<?php endwhile; endif; ?>
</div><!-- /#content -->

<?php get_template_part('parts/footer'); ?>
