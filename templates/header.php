<header class="banner" role="banner">
	<div class="banner__inner  container">
		<div class="branding">
			<div class="branding__inner">

				<a class="branding__brand  brand" href="<?php echo home_url(); ?>/">
					<h1 class="branding__site-title"><?php bloginfo('name'); ?></h1>
					<h2 class="branding__site-tagline"></h2>
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
			<div class="main-nav__inner">

				<?php
					if (has_nav_menu('primary_navigation')) :
						wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'level-1 nav nav--pills'));
					endif;
				?>
				
				<ul class="main-nav__social-menu  nav">
					<li class="main-nav__social-menu__item  social-icon--facebook  social-icon">
						<a href=""></a>
					</li>
					<li class="main-nav__social-menu__item  social-icon--twitter  social-icon">
						<a href=""></a>
					</li>
					<li class="main-nav__social-menu__item  social-icon--vimeo  social-icon">
						<a href=""></a>
					</li>
					<li class="main-nav__social-menu__item  social-icon--feed  social-icon">
						<a href=""></a>
					</li>
				</ul>

			</div>
		</nav>
	</div>
</header>