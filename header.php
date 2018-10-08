<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Shows an error page with poem if a page cannot be found.
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<?php if (get_bloginfo('pingback_url') && pings_open()) : ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php do_action('body_open'); ?>

	<div class="container">
		<div class="top">
			<h1><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1>
			<span id="tagline"><?php bloginfo('description'); ?></span>

		</div>

        <?php if (has_nav_menu('header_menu')) : ?>
        <nav class="header-menu">
            <label>
                <input type="checkbox" class="menu-trigger" />
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <?php wp_nav_menu('header_menu'); ?>
            </label>
        </nav>
        <?php endif; ?>

		<div class="content">
