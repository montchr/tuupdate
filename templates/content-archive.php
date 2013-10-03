<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article <?php post_class('pane  pane--cut'); ?>>

		<div class="pane__content  pane--cut__content">

			<header class="post__header">
				<h1 class="post__header__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="post__header__meta">
					<?php get_template_part('templates/entry-meta'); ?>
				</div>
			</header>

			<section class="post__content">
				<?php the_content( 'Continue reading &#187;', true ); ?>
			</section>

		</div>

	</article>

<?php endwhile; endif; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav class="post-nav">
		<ul class="nav  pagination">
			<li class="previous"><?php next_posts_link(__('&larr; Older posts', 'exai')); ?></li>
			<li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'exai')); ?></li>
		</ul>
	</nav>
<?php endif; ?>