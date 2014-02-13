<form role="search" method="get" class="form--search" action="<?php echo home_url('/'); ?>">
  <label for="s" class="form--search__label"><?php _e('Search', 'exai'); ?></label>
  <input type="text" class="form--search__input  text-input  s  search-query" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" placeholder="">
  <button type="submit" class="accessibility  form--search__submit  searchsubmit  btn"><?php _e('Search', 'exai'); ?></button>
</form>
