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
	<div class="<?php echo $namespace; ?>  sidebar-pane  pane">
		<div class="<?php echo $namespace; ?>__header  sidebar-pane__header  pane__header  pane__header--beta">
			<h3 class="<?php echo $namespace; ?>__header__title  sidebar-pane__header__title  pane__header--beta__title  pane__header__title"><?php echo $name; ?></h3>
		</div>
		<div class="<?php echo $namespace; ?>__content  sidebar-pane__content  pane__content">
			<?php

			if ($content) {
				echo $content;
			} else {
				get_template_part( 'templates/pane-sidebar', $slug );
			}

			?>
		</div>
	</div><!-- end <?php echo "." . $namespace; ?> -->
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