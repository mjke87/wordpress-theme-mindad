<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Displays blog posts of the current tag sorted by year and month.
 */
?>

<?php

$title = single_tag_title('#', false);
$term = get_queried_object();
$args = array('tag' => $term->name);

require locate_template('home.php');

?>