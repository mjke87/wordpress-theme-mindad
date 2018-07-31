<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Displays blog post of the current category sorted by year and month.
 */
?>

<?php

$title = single_cat_title('', false);
$term = get_queried_object();
$args = array('cat' => $term->term_id);

require locate_template('home.php');

?>