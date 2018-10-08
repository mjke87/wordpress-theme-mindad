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
add_action('wp_enqueue_scripts', 'mindad_enqueue_theme_styles', 10);

/**
 * Registers an editor stylesheet for the theme
 */
if (!function_exists('mindad_add_editor_styles')) {
    function mindad_add_editor_styles() {
        // TODO improve or remove
        add_editor_style(get_template_directory_uri() . '/assets/css/main.css');
    }
}
add_action('admin_init', 'mindad_add_editor_styles');

/**
 * Define inline styles for custom theme colors
 */
if (!function_exists('mindad_define_theme_colors')) {
    function mindad_define_theme_colors() {
        $accent_color = get_theme_mod('mindad_accent_color', '#56a49f');
		$background_color = get_theme_mod('mindad_background_color', '#ffffff');

        $inline_styles = ":root {--accent-color: $accent_color; --background-color: $background_color; }";
		wp_add_inline_style('mindad-main', $inline_styles);
    }
}
add_action('wp_enqueue_scripts', 'mindad_define_theme_colors', 15);

/**
 * Make the header sticky
 */
if (!function_exists('mindad_sticky_header')) {
    function mindad_sticky_header($wp_classes, $extra_classes) {
        if (get_theme_mod('mindad_sticky_header', false)) {
            $wp_classes[] = 'sticky';
        }
        return $wp_classes;
    }
}
add_filter('body_class', 'mindad_sticky_header', 10, 2);

/**
 * Register customizer options
 */
if (!function_exists('mindad_customize_register')) {
	function mindad_customize_register( $wp_customize ) {
        require_once(dirname(__FILE__) . '/inc/customizer.php');
	}
}
add_action('customize_register', 'mindad_customize_register');

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
                $format = apply_filters('future_title_format', __('Scheduled: %s', 'mindad'), $post_id);
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

/*
 * Display search page template in page table
 */
if (!function_exists('mindad_display_page_template')) {
    function mindad_display_page_template($post_states, $post) {
        $page_template = get_page_template_slug($post->ID);
        if ($page_template == 'searchpage.php') {
            $post_states['page_template'] = __('Search Page', 'mindad');
        }
        return $post_states;
    }
}
add_filter('display_post_states', 'mindad_display_page_template', 10, 2);

/*
 * Get the archives page
 */
if (!function_exists('mindad_get_post_archives_page')) {
    function mindad_get_post_archives_page() {
        $archives_page = get_option('page_for_posts');
        if (!$archives_page) {
            $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'home.php'
            ));
            foreach ($pages as $page) {
                $archives_page = $page;
            }
        }
        return $archives_page;
    }
}
?>