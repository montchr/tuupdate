<?php

$slug            = tuu_get_page_slug();

$category_id     = get_cat_ID( $slug );
$category_object = get_category_by_slug( $slug );
$category_title  = $category_object->name;
$category_link   = get_category_link( $category_id );

$query_string    = array(
						'cat'            => $category_id,
						'posts_per_page' => 10
                      );

$query           = new WP_Query($query_string);
?>


<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

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
<?php wp_reset_postdata(); ?>