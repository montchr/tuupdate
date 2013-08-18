<section class="page__content  pane__content  pane--cut__content">
	<?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages(array('before' => '<nav class="nav  pagination">', 'after' => '</nav>')); ?>
		<?php // comments_template('/templates/comments.php'); ?>
	<?php endwhile; ?>
</section>