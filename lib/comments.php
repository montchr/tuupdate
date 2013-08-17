<?php
/**
 * Use Bootstrap's media object for listing comments
 *
 * @link http://twitter.github.com/bootstrap/components.html#media
 */
class Roots_Walker_Comment extends Walker_Comment {
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$GLOBALS['comment_depth'] = $depth + 1; ?>
		<!-- I don't think the ul should have comment classes applied. -->
		<!-- <ul <?php comment_class('media unstyled comment-' . get_comment_ID()); ?>> -->
		<ul class="comment-thread">
		<?php
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$GLOBALS['comment_depth'] = $depth + 1;
		echo '</ul>';
	}

	function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;

		if (!empty($args['callback'])) {
			call_user_func($args['callback'], $comment, $args, $depth);
			return;
		}

		extract($args, EXTR_SKIP); ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class('media comment-' . get_comment_ID()); ?>>
		<?php include(locate_template('templates/comment.php')); ?>
	<?php
	}

	function end_el(&$output, $comment, $depth = 0, $args = array()) {
		if (!empty($args['end-callback'])) {
			call_user_func($args['end-callback'], $comment, $args, $depth);
			return;
		}
		echo "</li>\n";
	}
}

function exai_get_avatar($avatar) {
	$avatar = str_replace("class='avatar", "class='avatar media__img", $avatar);
	return $avatar;
}
add_filter('get_avatar', 'exai_get_avatar');
