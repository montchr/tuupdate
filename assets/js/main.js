/* Author: Chris Montgomery

*/




/* Main Menu */
jQuery(document).ready(function($) {
	$('body').addClass('js');
		var $menu = $('.main-nav'),
			$menulink = $('.menu-link'),
			//$menuItem = $('.main-nav ul li a'),
			$menuTrigger = $('.dropdown__toggle');

	$menulink.click(function(e) {
		e.preventDefault();
		$menulink.toggleClass('active');
		$menu.toggleClass('active');
	});

	$menuTrigger.click(function(e) {
		e.preventDefault();
		var $this = $(this);
		$this.toggleClass('active').next('ul').toggleClass('active');
	});

	/*$menuItem.hover(function(e) {
		e.preventDefault();
		//$(this).parents('li').parents('ul').andSelf().toggleClass('active');
		//$(this).toggleClass('active');
	});*/
});