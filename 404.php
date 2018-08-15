<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Shows an error page with poem if a page cannot be found.
 */
?>

<?php get_header(); ?>

	<?php $title = __('404', 'mindad'); ?>
	<?php require locate_template('notfound.php'); ?>

<?php get_footer(); ?>