<?php
/**
 * Cleaner walker for wp_nav_menu()
 *
 * Walker_Nav_Menu (WordPress default) example output:
 *   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
 *   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
 *
 * Roots_Nav_Walker example output:
 *   <li class="menu-home"><a href="/">Home</a></li>
 *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
 */
class Roots_Nav_Walker extends Walker_Nav_Menu {
	function check_current($classes) {
		return preg_match('/(current[-_])|active|dropdown/', $classes);
	}

	function start_lvl(&$output, $depth = 0, $args = array()) {
		/* Modified by Chris Montgomery 2013-07-25
		Add level classes to ul elements.
		.level-1 must be added in template file when calling wp_nav_menu() */
		$level = $depth + 2;
		$output .= "\n<ul class=\"";
		$output .= "level-" . $level . " ";
		$output .= "dropdown__menu nav--stacked nav\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$item_html = '';
		parent::start_el($item_html, $item, $depth, $args);

		// Remove depth dependency for dropdown toggle
		// montchr 2013-07-25
		if ($item->is_dropdown) {
			$item_html = str_replace('<a', '<a class="dropdown__toggle" data-toggle="dropdown" data-target="#"', $item_html);
		}
		elseif (stristr($item_html, 'li class="divider')) {
			$item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
		}
		elseif (stristr($item_html, 'li class="nav-header')) {
			$item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
		}

		$item_html = apply_filters('exai_wp_nav_menu_item', $item_html);
		$output .= $item_html;
	}

	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

		// Add dropdown and dropdown--submenu classes to any nested item
		// montchr 2013-08-04
		if ($element->is_dropdown) {
			if ($depth === 0) {
				$element->classes[] = 'dropdown';
			} elseif ($depth >= 1) {
				$element->classes[] = 'dropdown dropdown--submenu';
			}
		}

		/*if ($depth === 0) {
			$element->classes[] = 'level-1';
		} elseif ($depth === 1) {
			$element->classes[] = 'level-2';
		} elseif ($depth === 2) {
			$element->classes[] = 'level-3';
		}*/

		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}

/**
 * Remove the id="" on nav menu items
 * Return 'menu-slug' for nav menu classes
 */
function exai_nav_menu_css_class($classes, $item) {
	$slug = sanitize_title($item->title);
	$classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', '', $classes);
	$classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);

	$classes[] = 'menu-' . $slug;

	$classes = array_unique($classes);

	return array_filter($classes, 'is_element_empty');
}
add_filter('nav_menu_css_class', 'exai_nav_menu_css_class', 10, 2);
add_filter('nav_menu_item_id', '__return_null');

/**
 * Clean up wp_nav_menu_args
 *
 * Remove the container
 * Use Roots_Nav_Walker() by default
 */
function exai_nav_menu_args($args = '') {
	$exai_nav_menu_args['container'] = false;

	if (!$args['items_wrap']) {
		$exai_nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
	}

	// Increase max depth of dropdowns
	// $$DEV
	// montchr 2013-08-04
	if (current_theme_supports('exai-top-navbar')) {
		$exai_nav_menu_args['depth'] = 10;
	}

	if (!$args['walker']) {
		$exai_nav_menu_args['walker'] = new Roots_Nav_Walker();
	}

	return array_merge($args, $exai_nav_menu_args);
}
add_filter('wp_nav_menu_args', 'exai_nav_menu_args');
