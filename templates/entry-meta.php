<time class="post__header__meta__updated  post__updated  icon-text  published" datetime="<?php echo get_the_time('c'); ?>"><i class="icon-clock-dark  icon-text__icon"></i><?php echo get_the_date(); ?></time>
<span class="post__header__meta__byline  post__byline  author  vcard"><?php echo __('By', 'exai'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></span>
<div class="post__header__meta__categories  post__categories  nav"><?php tuu_post_categories(); ?></div>
<span class="post__header__meta__comments-number  comments-number  icon-text"><i class="icon-comment-dark  icon-text__icon"></i><?php tuu_comments_number(); ?></span>
