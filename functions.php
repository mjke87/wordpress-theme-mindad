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
 * Clean up head
 */
if (!function_exists('mindad_clean_up_head')) {
    function mindad_clean_up_head() {
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wp_no_robots');
        remove_action('wp_head', 'wp_shortlink_wp_head');
    }
}
add_action('wp_loaded', 'mindad_clean_up_head', 1);


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
 * Deactivate Gutenberg styles
 */
if (apply_filters('mindad_disable_gutenberg_styles', true)) {
    add_action('wp_enqueue_scripts', function() {
        wp_dequeue_style('wp-core-blocks');
    }, 99);
}

/**
 * Remove scripts
 */
if (apply_filters('mindad_disable_jquery', true)) {
     add_action('wp_enqueue_scripts', function() {
        remove_action('wp_head', 'wp_print_scripts');
        remove_action('wp_head', 'wp_print_head_scripts', 9);
        remove_action('wp_head', 'wp_enqueue_scripts', 1);
    });
}

/**
 * Disable emoji
 */
if (apply_filters('mindad_disable_emoji', true)) {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}

/**
 * Disable embed
 */
if (apply_filters('mindad_disable_embed', true)) {
    add_action('init', function () {
        // Remove the REST API endpoint.
        remove_action('rest_api_init', 'wp_oembed_register_route');

        // Turn off oEmbed auto discovery.
        add_filter('embed_oembed_discover', '__return_false');

        // Don't filter oEmbed results.
        remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

        // Remove oEmbed discovery links.
        remove_action('wp_head', 'wp_oembed_add_discovery_links');

        // Remove oEmbed-specific JavaScript from the front-end and back-end.
        remove_action('wp_head', 'wp_oembed_add_host_js');
        add_filter('tiny_mce_plugins', function ($plugins) {
            return array_diff($plugins, array('wpembed'));
        });

        // Remove all embeds rewrite rules.
        add_filter('rewrite_rules_array', function ($rules) {
            foreach($rules as $rule => $rewrite) {
                if(false !== strpos($rewrite, 'embed=true')) {
                    unset($rules[$rule]);
                }
            }
            return $rules;
        });

        // Remove filter of the oEmbed result before any HTTP requests are made.
        remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
    }, 50);
}

/**
 * Clean up classes using a blacklist
 */
function mindad_clean_classes($wp_classes, $extra_classes) {
	$blacklist = apply_filters('mindad_body_class_blacklist', array(
		'post-template-default',
		'single-format-standard',
		'wp-featherlight-captions',
		'/postid-.+/',
		'page-template-default',
		'/page-id-.+/',
		'page-template',
		'/page-template-(.+)-php/',
		'page-parent',
		'/category-.+/',
        '/post-.+/',
        'type-post',
        'status-publish',
        'format-standard',
        'hentry',
        'logged-in',
	));
	foreach($wp_classes as $i => $class) {
		foreach($blacklist as $block) {
			if ($class == $block) {
				unset($wp_classes[$i]);
			} else if (substr($block, 0, 1) == '/' && preg_match($block, $class)) {
				unset($wp_classes[$i]);
			}
		}
	}
    return array_merge($wp_classes, (array) $extra_classes);
}

/**
 * Clean up body classes
 */
 add_filter('body_class', 'mindad_clean_classes', 10, 2);

/**
 * Clean up post classes
 */
add_filter('post_class', 'mindad_clean_classes', 10, 2);

/**
 * Fix comment reply function if YOAST is installed.
 */
add_filter('wpseo_remove_reply_to_com', '__return_false');

?>