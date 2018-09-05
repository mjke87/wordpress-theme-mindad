<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Template that displays a search form after the content.
 */
?>

<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h2><?php the_title(); ?></h2>

		<article class="post">

			<?php the_content(); ?>

			<br/>

			<div class="fullwidth-searchform">
				<?php get_search_form(); ?>
			</div>

			<p>
				<small><em><?php __('It is recommend to use at least 3 characters for your search.', 'mindad'); ?></em></small>
			</p>

		</article>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>