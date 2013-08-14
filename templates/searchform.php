<form role="search" method="get" id="searchform" class="form--search" action="<?php echo home_url('/'); ?>">
	<label class="hide" for="s"><?php _e('Search for:', 'exai'); ?></label>
	<input type="text" class="text-input" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="s" class="search-query" placeholder="<?php _e('Search', 'exai'); ?> <?php bloginfo('name'); ?>">
	<input type="submit" id="searchsubmit" value="<?php _e('Search', 'exai'); ?>" class="btn">
</form>