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
	</section><!-- end <?php echo "." . $namespace; ?> -->
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
 * Does not work for posts.
 *
 * @link http://stackoverflow.com/questions/4837006/how-to-get-the-current-page-name-in-wordpress
 *
 * @return string The page slug
 */
function tuu_get_page_slug() {
	$pagename = get_query_var('pagename');
	if ( !$pagename && $id > 0 ) {
		// If a static page is set as the front page,
		// $pagename will not be set. Retrieve it from the queried object
		$post = $wp_query->get_queried_object();
		$pagename = $post->post_name;
	}
	return $pagename;
}





/**
 * Adds filter to a query getting posts.
 *
 * 1. Posts from past n days
 *
 * Usage:
 *  add_filter( 'posts_where', 'tuu_filter_where' );
 *  	$query = new WP_Query( $query_string );
 *  remove_filter( 'posts_where', 'tuu_filter_where' );
 *
 * @link http://codex.wordpress.org/Class_Reference/WP_Query#Time_Parameters
 *
 * @param  integer $days  Number of days in the past
 * @param  string  $where Additional query
 * @return [type]         [description]
 */
function tuu_filter_where( $days = '', $where = '' ) {
	if ($days) {
		$where .= " AND post_date > '" . date('Y-m-d', strtotime( '-' . $days . ' days' )) . "'";
	}

	return $where;
}







function tuu_alert() {
	$global post;

	$args = array(
	              'post_type' => 'alert',
	              'posts_per_page' => '1',

	);
}