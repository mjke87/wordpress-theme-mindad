<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Seach a search form with an error message if nothing was found.
 */
?>

		<h2><?php _e('Not found', 'mindad'); ?></h2>

		<p>
			<?php _e('Sorry, but you are looking for something that isn\'t here. Check back later or try searching for other content.', 'mindad'); ?>
		</p>

		<br/>

		<div class="fullwidth-searchform">
			<?php get_search_form(); ?>
		</div>