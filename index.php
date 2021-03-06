<?php get_template_part('templates/page', 'header'); ?>

<div class="pane pane--cut">
    <div class="pane--cut__content  pane__content">
        <?php if (!have_posts()) : ?>
          <div class="alert  alert--warning">
            <?php _e('Sorry, no results were found.', 'exai'); ?>
          </div>
          <?php get_search_form(); ?>
        <?php endif; ?>

        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', get_post_format()); ?>
        <?php endwhile; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
          <nav class="post-nav">
            <ul class="nav  pagination">
              <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'exai')); ?></li>
              <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'exai')); ?></li>
            </ul>
          </nav>
        <?php endif; ?>
    </div>
</div>
