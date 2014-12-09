<?php
/**
 * Custom functions
 */





/**
 * Returns content for sidebar panes.
 *
 * Uses the $slug parameter to generate CSS classes
 * and find the correct template for inner content.
 *
 * @param  string $name    The title of the sidebar-pane, to be displayed above the content
 * @param  string $slug    The name for class namespaces and template parts
 * @param  string $content Optional formatted HTML or PHP to print as content, overriding template
 *
 * @author Chris Montgomery
 */
function tuu_sidebar_pane($name, $slug, $content = '') {
  $namespace = "sidebar-pane--" . $slug;

  ?>
  <section class="<?php echo $namespace; ?>  sidebar-pane  pane">
    <header class="<?php echo $namespace; ?>__header  sidebar-pane__header  pane__header  pane__header--beta">
      <h3 class="<?php echo $namespace; ?>__header__title  sidebar-pane__header__title  pane__header--beta__title  pane__header__title  h--main"><?php echo $name; ?></h3>
    </header>
    <div class="<?php echo $namespace; ?>__content  sidebar-pane__content  pane__content">
      <?php

      if ($content) {
        echo $content;
      } else {
        get_template_part( 'templates/pane-sidebar', $slug );
      }

      ?>
    </div>
  </section>
<?php }





/**
 * Tames the output of the Custom Facebook Feed plugin.
 *
 * @param string $shortcode Use custom shortcode attributes.
 * @param bool   $lowercase Convert all to lowercase. Default is true.
 * @param bool   $flat      Remove linebreaks. Default is true.
 *
 * @return string Echo the filtered feed
 */
function tuu_facebook_feed($shortcode = '', $lowercase = true, $flat = true) {

  if (!$shortcode) {

    $feed = do_shortcode( '[custom-facebook-feed
                           textlength=140
                           type=links,status
                           layout=half
                           include=text,link,sharedlinks,date
    ]');

  } else {
    $feed = $shortcode;
  }

  /**
   * All to lowercase
   */
  if ($lowercase) {
    $feed = strtolower($feed);
  }

  /**
   * Remove linebreaks from status, replace with spaces.
   */
  if ($flat) {
    $feed = preg_replace( "/\r|\n/", " ", $feed );
  }

  echo $feed;
}





/**
 * Get the current page's slug.
 *
 * @link http://www.tcbarrett.com/2011/09/wordpress-the_slug-get-post-slug-function/
 * @link http://stackoverflow.com/questions/4837006/how-to-get-the-current-page-name-in-wordpress
 * @link http://stackoverflow.com/questions/2805879/wordpress-taxonomy-title-output
 *
 * @return $slug string The page slug
 */
function tuu_get_the_slug() {

  if (is_single()) {

    $slug = basename(get_permalink());
    do_action('before_slug', $slug);
    $slug = apply_filters('slug_filter', $slug);
    if( $echo ) echo $slug;
    do_action('after_slug', $slug);

  } elseif (is_page()) {

    $slug = get_query_var('pagename');
    if ( !$pagename && $id > 0 ) {
      // If a static page is set as the front page,
      // $pagename will not be set. Retrieve it from the queried object
      $post = $wp_query->get_queried_object();
      $pagename = $post->post_name;
    }

  } //elseif (is_category()) {
    $cat = get_category( get_query_var( 'cat' ) );
    $slug = $cat->slug;

    //$term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    //$slug = $term->name;
  //}

  return $slug;
}





/**
 * Echo the current page's slug.
 */
function tuu_the_slug() {
  echo tuu_get_the_slug();
}





/**
 * Adds filter to a query getting posts for the past few days.
 *
 * Usage:
 *  add_filter( 'posts_where', 'tuu_filter_where_days' );
 *    $query = new WP_Query( $query_string );
 *  remove_filter( 'posts_where', 'tuu_filter_where_days' );
 *
 * @link http://codex.wordpress.org/Class_Reference/WP_Query#Time_Parameters
 *
 * @param  integer $numdays  Number of days in the past. Default is 1.
 * @param  string  $where    Additional query
 * @return [type]            [description]
 */
function tuu_filter_where_days( $numdays = 1, $where = '' ) {
  $where .= " AND post_date > '" . date('Y-m-d', strtotime( '-' . $numdays . ' days' )) . "'";
  return $where;
}






/**
 * Display the most recent alert.
 *
 * Only echoes the content of alerts
 * from the past two days on the pages
 * selected in the alert edit screen.
 *
 * @param  boolean $force    Force the display
 */
function tuu_alert($force = false) {
  global $post;

  $query_string = array(
                       'post_type' => 'alert',
                       'posts_per_page' => '1',
  );

  add_filter( 'posts_where', 'tuu_filter_where_days' );
    $query = new WP_Query($query_string);
  remove_filter( 'posts_where', 'tuu_filter_where_days' );

  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

    $visibility = (get_field('alert_visibility', $post->ID)) ? get_field('alert_visibility', $post->ID) : array();

    $on_all = in_array('all', $visibility);
    $on_home = (in_array('home', $visibility) && is_front_page());

    $display = '';

    if ($on_all) {
      $display = true;
    }

    if ($on_home) {
      $display = true;
    }

    if ($display || $force) { ?>
      <div class="alert--alpha  alert  grid__item  one-whole">
        <div class="alert--alpha__inner  alert__inner  pane--short">
          <div class="alert--alpha__content  alert__content  pane--short__inner">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    <?php }

  endwhile; endif;

  wp_reset_query();
}




/**
 * Lists post categories.
 */
function tuu_post_categories() {
  $args = array(
    'hierarchical'       => 0,
    'title_li'           => '',
    'show_option_none'   => '',
  );

  //wp_list_categories( $args );
  echo get_the_category_list();
}




/**
 * Display number of comments.
 *
 * Must be used within The Loop.
 *
 * @link http://codex.wordpress.org/Template_Tags/get_comments_number#Examples
 * @return [type] [description]
 */
function tuu_comments_number() {
  $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

  if ( comments_open() ) {
    if ( $num_comments == 0 ) {
      $comments = __('No Comments', 'exai');
    } elseif ( $num_comments > 1 ) {
      $comments = $num_comments . __(' Comments', 'exai');
    } else {
      $comments = __('1 Comment', 'exai');
    }
    $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
  }

  echo $write_comments;
}


/**
 * Coauthors with the_author fallback.
 *
 * @param string $between Delimiter that should appear between the co-authors
 * @param string $between Last Delimiter that should appear between the last two co-authors
 * @param string $before What should appear before the presentation of co-authors
 * @param string $after What should appear after the presentation of co-authors
 * @param bool $echo Whether the co-authors should be echoed or returned. Defaults to true.
 */
function tuu_authors_posts_links($between = null, $betweenLast = null, $before = null, $after = null, $echo = true) {
    if ( function_exists( 'coauthors' ) ) {
        coauthors_posts_links($between, $betweenLast, $before, $after, $echo);
    } else {
        the_author_posts_link();
    }
}
