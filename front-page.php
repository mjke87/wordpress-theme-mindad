<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Front page / Homepage template.
 * Shows the latest blog post prominently with a link to the blog post archives page.
 */
?>

<?php get_header(); ?>

	<?php $posts = get_posts(array(
		'posts_per_page' => 1
	)); ?>

	<?php if (!empty($posts)) : ?>

	<?php foreach ($posts as $latest) : ?>

		<h2><a href="<?php echo get_permalink($latest->ID) ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), strip_tags(esc_attr(get_the_title($latest->ID)))); ?>">
			<?php echo get_the_title($latest->ID); ?>
		</a></h2>

		<article class="post">

			<?php
			$content = apply_filters('the_content', $latest->post_content);
			$content = str_replace(']]>', ']]&gt;', $content);
			echo $content;
			?>

		</article>

		<div class="all_posts">

			<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e('See all posts &raquo;', 'mindad'); ?></a>

		</div>

	<?php endforeach; ?>

	<?php else : ?>

		<?php get_template_part('notfound'); ?>

	<?php endif; ?>

<?php get_footer(); ?>