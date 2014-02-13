<header class="banner navbar navbar--static-top" role="banner">
  <div class="navbar__inner">
    <a class="brand" href="<?php echo home_url(); ?>/">
      <?php bloginfo('name'); ?>
    </a>
    <a class="btn btn--navbar menu-link" data-toggle="collapse" data-target=".nav-collapse">
      <i class="icon-reorder"></i>
      <span class="accessibility">Menu</span>
    </a>
    <nav id="main-nav" class="main-nav collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav level-1'));
        endif;
      ?>
    </nav>
  </div>
</header>
