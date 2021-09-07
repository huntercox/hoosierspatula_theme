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
						<?php

							// Termly.io Policy page - external link
								$termly_link = get_field('termly_policy_link');
								$title = get_the_title();

								if ( !empty($termly_link) ):
									echo '<div class="termly__policy-page">';

										echo '<a href="$termly_link" target="_blank" class="termly__link">';
											echo 'View our '.$title.' document on ';
											echo '<img src="'.get_stylesheet_directory_uri().'/assets/img/termly-logo.png" class="termly__logo" />';
										echo '</a>';
									echo '</div>';
								endif;

						?>
						<?php the_content(); ?>
				  </article>
				<?php endwhile; endif; ?>
      </div><!-- /.content -->
    </div><!-- /.col-sm-10 -->
  </div><!-- /.row -->
</main><!-- /.container -->

<?php get_template_part('parts/footer'); ?>
