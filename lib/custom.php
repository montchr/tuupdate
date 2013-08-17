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
	<div class="<?php echo $namespace; ?>  sidebar-pane--static  sidebar-pane  pane">
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