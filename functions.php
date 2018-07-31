<?php

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
 * Append read more link to post excerpts
 */

if (apply_filters('mindad_add_readmore_link', true)) {
    add_filter('the_excerpt', function($excerpt) {
    	$link = '<a href="' . get_permalink() . '"><small>' . __('Read more &raquo;', 'mindad') . '</small></a>';
    	return str_replace('</p>', ' ' . $link . '</p>', $excerpt);
    }, 10, 1);
}

/**
 * Years since shortcode
 */
if (apply_filters('mindad_add_years_shortcode', true)) {
    add_shortcode('years', function($atts) {
    	$atts = shortcode_atts(['date' => null], $atts);
    	$today = new DateTime();
    	if ($atts['date']) {
    		$date = new DateTime($atts['date']);
    		$diff = $today->diff($date);
    		return $diff->format('%y');
    	}
    	return $today->format('%y');
    });
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
 * Fix comment reply functino if YOAST is installed.
 */
add_filter('wpseo_remove_reply_to_com', '__return_false');

?>