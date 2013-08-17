<?php // dynamic_sidebar('sidebar-primary'); ?>







<?php

$content_watch = "
	<p>Watch Temple Update on TUTV: Comcast channel 50 and Verizon channel 45 within Philadelphia city limits, or online anywhere.</p>
	<p>New episodes air live at 11:30 a.m. and re-air at 7:30 p.m. every Thursday. Catch past episodes every day at 10 a.m. and 6 p.m.</p>
";

$content_weather = "
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, quae, obcaecati a incidunt assumenda sapiente quidem iusto ex reprehenderit accusamus molestias nihil est sit unde eum fuga iure labore placeat!</p>
";

$content_social = "
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, veritatis, laborum perspiciatis rem saepe eius ea fugit commodi rerum consequuntur pariatur distinctio adipisci ex corporis porro dolores nisi repellat asperiores.</p>
";

tuu_widget_static('Where To Watch', 'watch', $content_watch);
tuu_widget_static('WeatherWatch', 'weather', $content_weather);
tuu_widget_static('Follow Us', 'social', $content_social);

?>
