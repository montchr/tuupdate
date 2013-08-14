<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<h1 class="entry__title"><?php the_title(); ?></h1>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>
		<div class="entry__content">
			<?php the_content(); ?>
		</div>
		<footer>
			<?php wp_link_pages(array('before' => '<nav class="page-nav  nav  pagination"><p>' . __('Pages:', 'exai'), 'after' => '</p></nav>')); ?>
		</footer>
		<?php comments_template('/templates/comments.php'); ?>
	</article>
<?php endwhile; ?>
