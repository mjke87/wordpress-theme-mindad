<?php

/**
 * Declare content width
 */
if (!isset($content_width)) {
    $content_width = 720;
}

/**
 * Declare theme supports
 */
if (!function_exists('mindad_declare_theme_supports')) {
    function mindad_declare_theme_supports() {
        add_theme_support('title-tag');
    	add_theme_support('automatic-feed-links');
    }
}
add_action('after_setup_theme', 'mindad_declare_theme_supports');

/**
 * Register header menu
 */
if (!function_exists('mindad_register_header_menu')) {
    function mindad_register_header_menu() {
        register_nav_menus(array(
            'header_menu' => 'Header Menu'
        ));
    }
}
add_action('after_setup_theme', 'mindad_register_header_menu');

/**
 * Register footer menu
 */
if (!function_exists('mindad_register_footer_menu')) {
    function mindad_register_footer_menu() {
        register_nav_menus(array(
            'footer_menu' => 'Footer Menu'
        ));
    }
}
add_action('after_setup_theme', 'mindad_register_footer_menu');

/**
 * Allow excerpts for pages
 */
if (!function_exists('mindad_allow_excerpts_for_pages')) {
    function mindad_allow_excerpts_for_pages() {
        add_post_type_support('page', 'excerpt');
    }
}
add_action('init', 'mindad_allow_excerpts_for_pages');

/**
 * Enqueue theme styles
 */
if (!function_exists('mindad_enqueue_theme_styles')) {
    function mindad_enqueue_theme_styles() {
        wp_enqueue_style('mindad-main', get_template_directory_uri() . '/assets/css/main.css');

        if (is_singular() && comments_open()) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'mindad_enqueue_theme_styles');

/**
 * Define accent color
 */
if (!function_exists('mindad_define_accent_color')) {
    function mindad_define_accent_color() {
        $accent_color = apply_filters('mindad_accent_color', '#56a49f');
        ?><style type="text/css">:root {--accent-color: <?php echo $accent_color ?>;}</style><?php
    }
}
add_action('wp_head', 'mindad_define_accent_color', 10);

/**
 * Append read more link to post excerpts
 */
if (!function_exists('mindad_append_read_more_link')) {
    function mindad_append_read_more_link($excerpt) {
        $permalink = apply_filters('the_permalink', get_permalink(), 0);
    	$link = '<a href="' . $permalink . '" class="read-more"><small>' . __('Read more &raquo;', 'mindad') . '</small></a>';
    	return str_replace('</p>', ' ' . $link . '</p>', $excerpt);
    }
}
add_filter('the_excerpt', 'mindad_append_read_more_link', 15, 1);

/**
 * Change title of scheduled posts for the admin user
 */
if (!function_exists('mindad_display_scheduled_for_admin')) {
    function mindad_display_scheduled_for_admin($title, $post_id) {
        if (current_user_can('administrator')) {
            if (get_post_status($post_id) == 'future') {
                $format = apply_filters('future_title_format', __('Scheduled: %s', 'mindad'), $post);
                $title = sprintf($format, $title);
            }
        }
        return $title;
    }
}
add_filter('the_title', 'mindad_display_scheduled_for_admin', 15, 2);


/**
 * Transform post status to badges rather than plain text
 */
if (!function_exists('mindad_transform_post_status_to_badge')) {
    function mindad_transform_post_status_to_badge($format) {
        // Prepend badge tag
        $format = '<span class="badge">' . $format;
        // Replace colon with closin tag
        $pos = strpos($format, ':');
        $format = substr($format, 0, $pos) . '</span>' . substr($format, $pos + 1);
        return $format;
    }
}

/**
 * Display post status as badges rather than plain text
 */
if (!function_exists('mindad_display_post_status_as_badges')) {
    function mindad_display_post_status_as_badges() {
        if (!is_admin()) {
            add_filter('protected_title_format', 'mindad_transform_post_status_to_badge', 10, 1);
            add_filter('private_title_format', 'mindad_transform_post_status_to_badge', 10, 1);
            add_filter('future_title_format', 'mindad_transform_post_status_to_badge', 10, 1);
        }
    }
}
add_action('init', 'mindad_display_post_status_as_badges');

/**
 * Fix comment reply function if YOAST is installed.
 */
add_filter('wpseo_remove_reply_to_com', '__return_false');

?>