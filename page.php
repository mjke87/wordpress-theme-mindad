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

			<?php wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				)
			);?>

		</article>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>