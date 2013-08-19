<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?>>

		<header class="post__header">
			<h1 class="post__header__title"><?php the_title(); ?></h1>
			<div class="post__header__meta">
				<?php get_template_part('templates/entry-meta'); ?>
			</div>
		</header>

		<section class="post__content">
			<?php the_content(); ?>
		</section>

		<footer class="post__footer">
			<?php wp_link_pages(array('before' => '<nav class="page-nav  nav  pagination"><p>' . __('Pages:', 'exai'), 'after' => '</p></nav>')); ?>
		</footer>

		<?php comments_template('/templates/comments.php'); ?>

	</article>
<?php endwhile; ?>
