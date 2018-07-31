<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Simplified template for displaying static page content.
 */
?>

<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h2><?php the_title(); ?></h2>

		<article class="post">

			<?php the_content(); ?>

		</article>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>