<?php // dynamic_sidebar('sidebar-primary'); ?>

<?php

if (function_exists('tuu_sidebar_pane')) {
	tuu_sidebar_pane('Where To Watch', 'watch');
	tuu_sidebar_pane('WeatherWatch', 'weather');
	tuu_sidebar_pane('Follow Us', 'social');
}

?>
