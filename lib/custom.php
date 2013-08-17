<?php
/**
 * Custom functions
 */

/**
 * Returns HTML for sidebar with pane object classes.
 * @param  string $name    The title of the widget, to be displayed above the content
 * @param  string $slug    The lowercase namespace for CSS classes
 * @param  string $content Formatted HTML or PHP to print as content
 *
 * @author Chris Montgomery
 */
function tuu_widget_static($name, $slug, $content) {
	$slug = "widget--" . $slug;

	?>
	<div class="<?php echo $slug; ?>  widget--static  widget  pane">
		<div class="<?php echo $slug; ?>__header  widget__header  pane__header  pane__header--beta">
			<h3 class="<?php echo $slug; ?>__header__title  widget__header__title  pane__header--beta__title  pane__header__title"><?php echo $name; ?></h3>
		</div>
		<div class="<?php echo $slug; ?>__content  widget__content  pane__content">
			<?php echo $content; ?>
		</div>
	</div><!-- end <?php echo "." . $slug; ?> -->
<?php }