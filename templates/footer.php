<footer id="footer" class="content-info" role="contentinfo">
	<div class="footer__inner  wrap  container  grid">
		<div class="footer__search  grid__item  desk--one-third">
			<?php get_search_form(); ?>
		</div><!--
		--><div class="footer__widgets  grid__item  desk--one-third">
			<?php dynamic_sidebar('sidebar-footer'); ?>
		</div><!--
		--><div class="footer__about  grid__item  desk--one-third">
			<i class="footer__about__logo  icon-logo"></i>
			<?php

			if (has_nav_menu('footer_links')) :
				wp_nav_menu(array(
					'theme_location' => 'footer_links',
					'after'          => '<span class="divider">&#9679;</span>',
					'menu_class'     => 'footer__about__links  level-1  nav'
				));
			endif;

			?>
			<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?><br />
				All rights reserved.</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
