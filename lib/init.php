<?php
/**
 * Roots initial setup and constants
 */
function exai_setup() {
	// Make theme available for translation
	load_theme_textdomain('exai', get_template_directory() . '/lang');

	// Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'exai'),
		'footer_links'       => __( 'Footer Links', 'exai' ),
	));

	// Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	// add_image_size('category-thumb', 300, 9999); // 300px wide (and unlimited height)

	// Add post formats (http://codex.wordpress.org/Post_Formats)
	// add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

	// Tell the TinyMCE editor to use a custom stylesheet
	add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'exai_setup');

// Backwards compatibility for older than PHP 5.3.0
if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

/**
 * Custom post type: Alert
 */
function tuu_post_type_alert() {

	$labels = array(
		'name'                => _x( 'Alerts', 'Post Type General Name', 'exai' ),
		'singular_name'       => _x( 'Alert', 'Post Type Singular Name', 'exai' ),
		'menu_name'           => __( 'Alert', 'exai' ),
		'parent_item_colon'   => __( 'Parent Alert:', 'exai' ),
		'all_items'           => __( 'All Alerts', 'exai' ),
		'view_item'           => __( 'View Alert', 'exai' ),
		'add_new_item'        => __( 'Add New Alert', 'exai' ),
		'add_new'             => __( 'New Alert', 'exai' ),
		'edit_item'           => __( 'Edit Alert', 'exai' ),
		'update_item'         => __( 'Update Alert', 'exai' ),
		'search_items'        => __( 'Search alerts', 'exai' ),
		'not_found'           => __( 'No alerts found', 'exai' ),
		'not_found_in_trash'  => __( 'No alerts found in Trash', 'exai' ),
	);
	$args = array(
		'label'               => __( 'alert', 'exai' ),
		'description'         => __( 'A message box, usually appearing at the top of a page.', 'exai' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'custom-fields', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'alert', $args );
}
add_action( 'init', 'tuu_post_type_alert', 0 );