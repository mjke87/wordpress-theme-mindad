<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Home / Posts page template.
 * Shows a list of all blog posts sorted by year and month.
 */
?>

<?php get_header(); ?>

	<?php if (isset($title) && $title) : ?>
		<h2><?php echo $title; ?></h2>
    <?php endif; ?>

    <?php

	$args = array_merge(!isset($args) || empty($args) ? array() : $args, array(
        'posts_per_page' => -1
    ));

    $all_posts = get_posts($args);

    $ordered_posts = array();
    foreach ($all_posts as $single) {
      $year  = mysql2date('Y', $single->post_date);
      $month = mysql2date('F', $single->post_date);
      $ordered_posts[$year][$month][] = $single;
    }
	?>

	<?php if (!empty($all_posts)) : ?>

	<ul class="years">
    <?php foreach ($ordered_posts as $year => $months) : ?>
    	<li>
        <h3><?php echo $year ?></h3>

        <ul class="months">
        <?php foreach ($months as $month => $posts ) : ?>
          <li>
			<h4><?php _e($month, 'mindad'); ?></h4>

            <ul class="posts">
			  <?php $last_day = 1; ?>
              <?php foreach ($posts as $single ) : ?>

                <li>
                  <span class="post-date">
					  <?php
		              $current_day = mysql2date('j', $single->post_date);
                      echo $current_day == $last_day ? '&nbsp;' : $current_day;
                      $last_day = $current_day;
                      ?>
                  </span>
				  <a href="<?php echo get_permalink($single->ID); ?>"><?php echo get_the_title($single->ID); ?></a>
                </li>

              <?php endforeach; ?>
            </ul>

          </li>
        <?php endforeach; ?>
        </ul>

      </li>
	  <?php endforeach; ?>
    </ul>

	<?php else : ?>

		<?php get_template_part('notfound'); ?>

	<?php endif; ?>

<?php get_footer(); ?>