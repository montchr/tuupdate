<?php while (have_posts()) : the_post(); ?>
	<div class="page-content__dek dek">
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>

<?php dynamic_sidebar( 'sidebar-update-now' ); ?>