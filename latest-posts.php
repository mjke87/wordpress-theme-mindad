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

	<?php
	$get_posts = new WP_Query;
	$posts = $get_posts->query();
	?>

	<?php if (!empty($posts)) : ?>

	<?php foreach ($posts as $latest) : ?>

		<h2><a href="<?php echo get_permalink($latest->ID) ?>" rel="bookmark" title="<?php echo esc_attr(sprintf(__('Permanent Link to %s', 'mindad'), strip_tags(get_the_title($latest->ID)))); ?>">
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

		<?php if ($archives_page = mindad_get_post_archives_page()) : ?>
			<a href="<?php echo get_permalink($archives_page); ?>"><?php _e('See all posts &raquo;', 'mindad'); ?></a>
		<?php endif; ?>

		</div>

	<?php endforeach; ?>

	<?php else : ?>

		<?php get_template_part('notfound'); ?>

	<?php endif; ?>

<?php get_footer(); ?>