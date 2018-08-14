<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Displays comments form and lists comments.
 */
?>

<?php if (post_password_required()) : ?>
	<p class="nocomments">
        <?php _e('This post is password protected. Enter the password to view comments.', 'mindad'); ?>
    </p>
    <?php return; ?>
<?php endif; ?>

<?php if (have_comments()) : ?>
	<h3 id="comments">
		<?php
			if (get_comments_number() == 1) {
				/* translators: %s: post title */
				printf(__('One response to %s', 'mindad'),  '&laquo;' . get_the_title() . '&raquo;');
			} else {
				/* translators: 1: number of comments, 2: post title */
				printf(_n('%1$s response to %2$s', '%1$s responses to %2$s', get_comments_number(), 'mindad'),
					number_format_i18n(get_comments_number()),  '&laquo;' . get_the_title() . '&raquo;');
			}
		?>
	</h3>

	<div class="navigation">
		<div class="alignleft">
            <?php previous_comments_link() ?>
        </div>
		<div class="alignright">
            <?php next_comments_link() ?>
        </div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments();?>
	</ol>

	<div class="navigation">
		<div class="alignleft">
            <?php previous_comments_link() ?>
        </div>
		<div class="alignright">
            <?php next_comments_link() ?>
        </div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if (!comments_open()) : ?>
		<p class="nocomments">
            <?php _e('Comments are closed.'); ?>
        </p>
	<?php endif; ?>

<?php endif; ?>

<?php comment_form(); ?>