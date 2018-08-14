<?php

if ( ! isset( $content_width ) ) $content_width = 720;

/**
 * Declare title support
 */
add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
});

/**
 * Register header menu
 */
register_nav_menus(array(
    'header_menu' => 'Header Menu'
));

/**
 * Register footer menu
 */
register_nav_menus(array(
    'footer_menu' => 'Footer Menu'
));

/**
 * Allow excerpts for pages
 */
add_post_type_support('page', 'excerpt');

/**
 * Enquees theme styles
 */
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('mindad-main', get_template_directory_uri() . '/assets/css/main.css');
});

/**
 * Define accent color
 */
add_action('wp_head', function() {
    $accent_color = apply_filters('mindad_accent_color', '#56a49f');
    ?><style type="text/css">:root {--accent-color: <?php echo $accent_color ?>;}</style><?php
}, 10);

/**
 * Clean up head
 */
if (apply_filters('mindad_clean_head', true)) {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_no_robots');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}

/**
 * Append read more link to post excerpts
 */
if (apply_filters('mindad_add_readmore_link', true)) {
    add_filter('the_excerpt', function($excerpt) {
        $permalink = apply_filters('the_permalink', get_permalink(), 0);
    	$link = '<a href="' . $permalink . '" class="read-more"><small>' . __('Read more &raquo;', 'mindad') . '</small></a>';
    	return str_replace('</p>', ' ' . $link . '</p>', $excerpt);
    }, 15, 1);
}

/**
 * Change title of scheduled posts for the admin user
 */
if (apply_filters('mindad_display_scheduled_for_admin', true)) {
    add_filter('the_title', function($title, $post_id) {
        if (current_user_can('administrator')) {
            if (get_post_status($post_id) == 'future') {
                $format = apply_filters('future_title_format', __('Scheduled: %s'), $post);
                $title = sprintf($format, $title);
            }
        }
        return $title;
    }, 15, 2);
}

/**
 * Display post status as badges rather than plain text
 */
if (apply_filters('mindad_display_post_status_as_badges', true)) {
    if (!is_admin()) {
        $filter = function($format) {
            // Prepend badge tag
            $format = '<span class="badge">' . $format;
            // Replace colon with closin tag
            $pos = strpos($format, ':');
            $format = substr($format, 0, $pos) . '</span>' . substr($format, $pos + 1);
            return $format;
        };
        add_filter('protected_title_format', $filter, 10, 1);
        add_filter('private_title_format', $filter, 10, 1);
        add_filter('future_title_format', $filter, 10, 1);
    }
}

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
        'hentry'
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