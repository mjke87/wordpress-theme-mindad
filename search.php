<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Template for displaying search results.
 */
?>

<?php get_header(); ?>

		<?php if (have_posts()) : ?>

			<h2><?php printf(__('Search results for &laquo;%s&raquo;', 'mindad'), get_search_query()); ?></h2>

			<div class="fullwidth-searchform">
				<?php get_search_form(); ?>
			</div>

			<?php while (have_posts()) : the_post(); ?>

			<article class="search-item">
				<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr(sprintf(__('Permanent Link to %s', 'mindad'), the_title_attribute(array('echo' => false)))); ?>">
					<?php the_title(); ?>
				</a></h4>

				<div class="post">
					<?php the_excerpt(); ?>
				</div>
			</article>

			<?php endwhile; ?>

			<?php if ($GLOBALS['wp_query']->max_num_pages > 1) : ?>
			<div class="post-pagination">
				<?php echo paginate_links(array(
					'mid_size'           => 5,
					'prev_text'          => '&laquo;',
					'next_text'          => '&raquo;',
					'before_page_number' => '',
				)); ?>
			</div>
			<?php endif; ?>

		<?php else : ?>

			<?php get_template_part('notfound'); ?>

		<?php endif; ?>

<?php get_footer(); ?>