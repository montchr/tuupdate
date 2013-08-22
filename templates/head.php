<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>

	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!-- Typekit -->
	<script type="text/javascript" src="//use.typekit.net/zij5zda.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<!-- Icons -->
	<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
	<link rel="icon" href="/favicon.png">
	<!--[if IE]><link rel="shortcut icon" href="/favicon.ico"><![endif]-->
	<!-- or, set /favicon.ico for IE10 win -->
	<meta name="msapplication-TileColor" content="#9e1b34">
	<meta name="msapplication-TileImage" content="/apple-touch-icon-144x144-precomposed.png">

	<!-- Flexslider -->
	<script type="text/javascript" charset="utf-8">
	  jQuery(window).load(function() {
	    $('.flexslider').flexslider();
	  });
	</script>

	<!-- Unicode CSS Loader: place this in the head of your page -->
	<script>
	/* grunticon Stylesheet Loader | https://github.com/filamentgroup/grunticon | (c) 2012 Scott Jehl, Filament Group, Inc. | MIT license. */
	window.grunticon=function(e){if(e&&3===e.length){var t=window,n=!!t.document.createElementNS&&!!t.document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect&&!!document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1"),A=function(A){var o=t.document.createElement("link"),r=t.document.getElementsByTagName("script")[0];o.rel="stylesheet",o.href=e[A&&n?0:A?1:2],r.parentNode.insertBefore(o,r)},o=new t.Image;o.onerror=function(){A(!1)},o.onload=function(){A(1===o.width&&1===o.height)},o.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="}};
	grunticon( [ "/assets/img/icons/icons.data.svg.css", "/assets/img/icons/icons.data.png.css", "/assets/img/icons/icons.fallback.css" ] );</script>
	<noscript><link href="/assets/img/icons/icons.fallback.css" rel="stylesheet"></noscript>
</head>
