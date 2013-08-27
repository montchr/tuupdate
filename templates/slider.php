<div class="slider  flexslider">
	<ul class="slides">

		<?php

		$args = array(
		              'posts_per_page' => 4,
		              //'meta_key' => 'featured',
		              //'meta_value' => true
		              );

		$query = new WP_Query($args);

		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

			<li class="slide">

				<div class="slide__img">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider-img'); ?></a>
				</div><!--
				--><div class="slide__info">
					<h1 class="slide__info__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<div class="slide__info__dek">
						<?php the_excerpt(); ?>
					</div>
				</div>

			</li>

		<?php endwhile; endif; ?>

	</ul>
</div>