<?php

/**
 * Registers support for Gutenberg features.
 */
if (!function_exists('mindad_gutenberg_support')) {
    function mindad_gutenberg_support() {

    	// Add theme support for custom color palette.
    	add_theme_support('editor-color-palette', array(
    		array(
    			'name'  => esc_html__('Accent', 'mindad'),
    			'slug'  => 'accent',
    			'color' => get_theme_mod('mindad_accent_color', '#56a49f')
    		),
    		array(
    			'name'  => esc_html__('White', 'mindad'),
    			'slug'  => 'white',
    			'color' => '#ffffff',
    		),
    		array(
    			'name'  => esc_html__('Light Gray', 'mindad'),
    			'slug'  => 'light-gray',
    			'color' => '#f2f2f2',
    		),
    		array(
    			'name'  => esc_html__('Gray', 'mindad'),
    			'slug'  => 'gray',
    			'color' => '#777777',
    		),
    		array(
    			'name'  => esc_html__('Dark Gray', 'mindad'),
    			'slug'  => 'dark-gray',
    			'color' => '#333333',
    		),
    	) );

    	// Disable theme support for custom colors.
    	add_theme_support('disable-custom-colors');
    }
}
add_action('after_setup_theme', 'mindad_gutenberg_support');

/**
 * Enqueue styles for Gutenberg.
 */
if (!function_exists('mindad_block_editor_assets')) {
    function mindad_block_editor_assets() {
 	   wp_enqueue_style('theme-slug-editor-styles', get_theme_file_uri('/assets/css/editor.css'));
    }
}
add_action('enqueue_block_editor_assets', 'mindad_block_editor_assets');

?>