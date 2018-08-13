<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Template for displaying post content, including post date, adjacent posts and comments.
 */
?>

<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h2><?php the_title(); ?></h2>

		<article <?php post_class('post'); ?>>

			<?php the_content(); ?>

		</article>

		<div class="home_bottom"></div>

		<div class="navigation">
			<p>
				<strong><?php _e('Posted', 'mindad'); ?></strong>:<br/>
				<time rel="date"><?php the_date(get_option('date_format')); ?></time>
				<span><?php _e('by', 'mindad'); ?></span>
				<?php the_author_link(); ?>
			</p>

			<?php if (get_adjacent_post(false, '', true)): // check if there are older posts ?>
			<p>
				<strong><?php _e('Previous post', 'mindad'); ?></strong>:<br/>
				<?php previous_post_link('%link'); ?>
			</p>
			<?php endif; ?>

			<?php if (get_adjacent_post(false, '', false)): // check if there are newer posts ?>
    			<p>
					<strong><?php _e('Next post', 'mindad'); ?></strong>:<br/>
					<?php next_post_link('%link'); ?>
				</p>
			<?php endif; ?>
		</div>

		<?php endwhile; else: ?>
			<?php get_template_part('notfound'); ?>
		<?php endif; ?>

		<?php if (comments_open()) : ?>
			<?php comments_template(); ?>
		<?php endif; ?>

<?php get_footer(); ?>