<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Displays the footer menu and WordPress footer part.
 */
?>

		</div>

		<?php if (has_nav_menu('footer_menu')) : ?>
		<div class="footer">
			<?php wp_nav_menu('footer_menu'); ?>
		</div>
		<?php endif; ?>

	</div>

	<?php wp_footer(); ?>

</body>
</html>