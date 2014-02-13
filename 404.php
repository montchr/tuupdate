<?php get_template_part('templates/page', 'header'); ?>

<div class="pane pane--cut">
    <div class="pane--cut__content  pane__content">

        <div class="alert alert--warning">
        	<?php _e('Sorry, but the page you were trying to view does not exist.', 'exai'); ?>
        </div>

        <p><?php _e('It looks like this was the result of either:', 'exai'); ?></p>
        <ul>
            <li><?php _e('a mistyped address', 'exai'); ?></li>
            <li><?php _e('an out-of-date link', 'exai'); ?></li>
        </ul>

        <?php get_search_form(); ?>
    </div>
</div>

<p><?php _e('It looks like this was the result of either:', 'exai'); ?></p>
<ul>
  <li><?php _e('a mistyped address', 'exai'); ?></li>
  <li><?php _e('an out-of-date link', 'exai'); ?></li>
</ul>

<?php get_search_form(); ?>
