<?php get_template_part('parts/header'); ?>

<div class="container">
  <div class="row justify-content-center">
		<div class="col-sm-10">
      <div id="content" role="main">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
				  <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
				    <header>
				      <h1><?php the_title(); ?></h1>
				    </header>
				    <?php the_content(); ?>
				  </article>
				<?php endwhile; endif; ?>
      </div><!-- /#content -->
    </div><!-- /.col-sm-10 -->
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('parts/footer'); ?>
