<header class="banner" role="banner">
	<div class="banner__inner">
		<div class="branding">
			<div class="branding__inner  container">

				<a class="brand" href="<?php echo home_url(); ?>/">
					<div class="brand__logo  logo">
						<i class="icon-logo  icon"></i>
					</div>
					<div class="brand__about">
						<h1 class="brand__about__site-title  site-title"><?php bloginfo('name'); ?></h1><!--
						--><p class="brand__about__site-tagline  site-tagline"><?php bloginfo('description'); ?></p>
					</div>
				</a>

				<a class="btn  btn--navbar  menu-link" data-toggle="collapse" data-target=".nav-collapse">
					<i class="icon-menu"></i>
					<span class="accessibility">Menu</span>
				</a>

			</div>
		</div><!-- end .branding -->

		<div class="drawer">
			<div class="drawer__inner  container">
				<?php if (is_front_page()) { get_template_part( 'templates/slider' ); } ?>
			</div>
		</div>

		<nav class="main-nav" role="navigation">
			<div class="main-nav__inner  container">
				<div class="main-nav__menus">

					<?php
						if (has_nav_menu('primary_navigation')) :
							wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'main-nav__primary-navigation  level-1  nav'));
						endif;
					?>

					<ul class="main-nav__social-menu  nav">
						<li class="main-nav__social-menu__item  social-icon--facebook  social-icon  icon">
							<a href="//www.facebook.com/templeupdate"><i class="icon-facebook"></i></a>
						</li><!--
						--><li class="main-nav__social-menu__item  social-icon--twitter  social-icon  icon">
							<a href="//twitter.com/TempleUpdate"><i class="icon-twitter"></i></a>
						</li><!--
						--><li class="main-nav__social-menu__item  social-icon--vimeo  social-icon  icon">
							<a href="//vimeo.com/album/1521800"><i class="icon-vimeo"></i></a>
						</li><!--
						--><li class="main-nav__social-menu__item  social-icon--feed  social-icon  icon">
							<a href="<?php bloginfo('atom_url'); ?>"><i class="icon-feed"></i></a>
						</li>
					</ul>

				</div><!-- end .main-nav__menus -->
			</div><!-- end .main-nav__inner -->
		</nav><!-- end .main-nav -->

	</div><!-- end .banner__inner -->
</header>