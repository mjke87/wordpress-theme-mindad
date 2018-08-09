<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Shows an error page with poem if a page cannot be found.
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<title><?php if ( is_single() ) { ?> <?php } ?><?php wp_title(':',true,'right'); ?> <?php bloginfo('name'); ?></title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab" rel="stylesheet">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

    <?php do_action('body_open'); ?>

	<div class="container">
		<div class="top">
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<span id="tagline"><?php bloginfo('description'); ?></span>

		</div>

        <?php if (has_nav_menu('header_menu')) : ?>
        <nav class="header-menu">
            <label>
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <input type="checkbox" class="menu-trigger" />
                <?php wp_nav_menu('header_menu'); ?>
            </label>
        </nav>
        <?php endif; ?>

		<div class="content">
