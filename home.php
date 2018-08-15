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

	if (apply_filters('mindad_display_scheduled_for_admin', true)) {
		if (current_user_can('administrator')) {
			$args['post_status'] = 'publish,future';
		}
	}

    $all_posts = get_posts($args);

    $ordered_posts = array();
    foreach ($all_posts as $single) {
      $year  = date_i18n('Y', strtotime($single->post_date));
      $month = date_i18n('F', strtotime($single->post_date));
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
			<h4><?php echo $month; ?></h4>

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
				  <a href="<?php echo get_permalink($single->ID); ?>" <?php post_class(null, $single->ID); ?>>
					  <?php echo get_the_title($single->ID); ?>
				  </a>
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