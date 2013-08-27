<?php

// List of categories to iterate through for display.
// Must be a list of category slugs
// Order matters.
$categories = array(
                    'news',
                    'entertainment',
                    'sportsdesk',
                    );


foreach ($categories as $category) :

	$category_id     = get_cat_ID( $category );
	$category_object = get_category_by_slug( $category );
	$category_title  = $category_object->name;
	$category_link   = get_category_link( $category_id );

	$query_string = array(
						 'category_name'  => $category,
						 'posts_per_page' => 2
	                      );

	$query = new WP_Query($query_string); ?>

	<section class="home__recent-posts--<?php echo $category; ?>  home__recent-posts  pane  pane--cut">

		<header class="home__recent-posts--<?php echo $category; ?>__header  home__recent-posts__header  pane__header--alpha  pane__header">
			<h1 class="home__recent-posts--<?php echo $category; ?>__header__title  home__recent-posts__header__title  pane__header--alpha__title  pane__header__title  h--main">
				<a href="<?php echo $category_link; ?>"><?php echo ucwords($category_title); ?></a>
			</h1>
		</header>

		<div class="home__recent-posts--<?php echo $category; ?>__content  home__recent-posts__content  pane__content  pane--cut__content">

			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

				<article class="home__recent-post">

					<header class="home__recent-post__header">
						<time class="home__recent-post__header__post-updated  post__updated  icon-text" datetime="<?php echo get_the_time('c'); ?>" pubdate><i class="icon-clock-dark  icon-text__icon"></i><?php echo get_the_date(); ?></time>
						<h1 class="home__recent-post__header__title"><?php the_title(); ?></h1>
					</header>

					<div class="home__recent-post__content">
						<?php the_excerpt(); // the_content( 'Continue reading &#187;' ); ?>
					</div>

				</article>

			<?php endwhile; endif; ?>
			<?php wp_reset_query(); ?>

		</div>

	</section>

<?php
endforeach;
?>