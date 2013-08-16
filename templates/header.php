<header class="banner" role="banner">
	<div class="banner__inner  container">
		<div class="branding">
			<div class="branding__inner">

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
					<i class="icon-reorder"></i>
					<span class="accessibility">Menu</span>
				</a>
				
			</div>
		</div>

		<div class="banner__drawer  drawer">
			<div class="banner__drawer__slider  slider"></div>
		</div>

		<nav class="main-nav" role="navigation">

				<?php
					if (has_nav_menu('primary_navigation')) :
						wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'level-1 nav nav--pills'));
					endif;
				?>
				
				<ul class="main-nav__social-menu  nav">
					<li class="main-nav__social-menu__item  social-icon--facebook  social-icon  icon">
						<a href=""><i class="icon-facebook"></i></a>
					</li><!--
					--><li class="main-nav__social-menu__item  social-icon--twitter  social-icon  icon">
						<a href=""><i class="icon-twitter"></i></a>
					</li><!--
					--><li class="main-nav__social-menu__item  social-icon--vimeo  social-icon  icon">
						<a href=""><i class="icon-vimeo"></i></a>
					</li><!--
					--><li class="main-nav__social-menu__item  social-icon--feed  social-icon  icon">
						<a href=""><i class="icon-rss"></i></a>
					</li>
				</ul>

		</nav>
	</div>
</header>