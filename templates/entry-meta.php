<time class="updated  icon-text" datetime="<?php echo get_the_time('c'); ?>" pubdate><i class="icon-clock-dark icon-text__icon"></i><?php echo get_the_date(); ?></time>
<span class="byline author vcard"><?php echo __('By', 'exai'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></span>
<?php tuu_post_categories(); ?>
<span class="comments-number icon-text"><i class="icon-comment-dark icon-text__icon"></i><?php tuu_comments_number(); ?></span>