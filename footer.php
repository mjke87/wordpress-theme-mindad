<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Displays the footer menu and WordPress footer part.
 */
?>

		</div>

		<div class="footer">

			<?php if (has_nav_menu('footer_menu')) {
				wp_nav_menu('footer_menu');
			} ?>

		</div>

	</div>

	<?php wp_footer(); ?>

</body>
</html>