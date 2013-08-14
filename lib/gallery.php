<?php
/**
 * Clean up gallery_shortcode()
 *
 * Re-create the [gallery] shortcode and use Inuit.CSS' "matrix" object
 *
 */
function exai_gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if (!empty($attr['ids'])) {
		if (empty($attr['orderby'])) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	$output = apply_filters('post_gallery', '', $attr);

	if ($output != '') {
		return $output;
	}

	if (isset($attr['orderby'])) {
		$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
		if (!$attr['orderby']) {
			unset($attr['orderby']);
		}
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => '',
		'icontag'    => '',
		'captiontag' => '',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => 'file'
	), $attr));

	$id = intval($id);

	if ($order === 'RAND') {
		$orderby = 'none';
	}

	if (!empty($include)) {
		$_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

		$attachments = array();
		foreach ($_attachments as $key => $val) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif (!empty($exclude)) {
		$attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	} else {
		$attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	}

	if (empty($attachments)) {
		return '';
	}

	if (is_feed()) {
		$output = "\n";
		foreach ($attachments as $att_id => $attachment) {
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		}
		return $output;
	}

	/**
	 * Column width classes for matrix object
	 */
	$columns_en = '';

	if ($columns) {
		if ($columns == 1) {
			$columns_en = "one-col";
		} elseif ($columns == 2) {
			$columns_en = "two-cols";
		} elseif ($columns == 3) {
			$columns_en = "three-cols";
		} elseif ($columns == 4) {
			$columns_en = "four-cols";
		} elseif ($columns == 5) {
			$columns_en = "five-cols";
		} elseif ($columns == 6) {
			$columns_en = "six-cols";
		} elseif ($columns == 7) {
			$columns_en = "seven-cols";
		} elseif ($columns == 8) {
			$columns_en = "eight-cols";
		} elseif ($columns == 9) {
			$columns_en = "nine-cols";
		}
	}

	$output = '<ul class="gallery  multi-list  ' . $columns_en . ' ' . $columns . '">';

	$i = 0;
	foreach ($attachments as $id => $attachment) {
		$image = ('file' == $link) ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

		$output .= '<li>' . $image;
		if (trim($attachment->post_excerpt)) {
			$output .= '<div class="gallery__caption  matrix__caption  caption  accessibility">' . wptexturize($attachment->post_excerpt) . '</div>';
		}
		$output .= '</li>';
	}

	$output .= '</ul>';

	return $output;
}
if (current_theme_supports('exai-gallery')) {
	remove_shortcode('gallery');
	add_shortcode('gallery', 'exai_gallery');
}
