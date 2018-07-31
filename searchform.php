<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Template for displaying the search form.
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url(home_url()); ?>">
		<input type="search" class="field" name="s" id="s" placeholder="<?php _e('Search for...', 'mindad'); ?>" value="<?php echo get_search_query(); ?>"/>
		<input type="submit" class="submit" id="searchsubmit" value="<?php _e('Search', 'mindad'); ?>" />
	</form>