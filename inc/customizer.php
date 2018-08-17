<?php

/*
 * Colors
 * Note: colors section exists by default, no need to register
 */

// accent color
$wp_customize->add_setting('mindad_accent_color', array(
    'default'   => '#56a49f',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mindad_accent_color', array(
    'label'       => __('Accent Color', 'mindad'),
    'description' => __('Give your site a kick with a discernible accent color.', 'mindad'),
    'section'     => 'colors',
    'settings'    => 'mindad_accent_color',
)));

// background color
$wp_customize->add_setting('mindad_background_color', array(
    'default'   => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mindad_background_color', array(
    'label'       => __('Background Color', 'mindad'),
    'description' => __('Adjust the color of the background if needed.', 'mindad'),
    'section'     => 'colors',
    'settings'    => 'mindad_background_color',
)));

/*
 * Header Settings
 */
$wp_customize->add_section('header_settings', array(
    'title' => __('Header', 'mindad'),
    'description' => __('Change the behavior of the header', 'mindad'),
    'priority'    => 160,
    'capability'  => 'edit_theme_options'
));
// sticky header
$wp_customize->add_setting('mindad_sticky_header', array('default'   => '#123123'));
$wp_customize->add_control('mindad_sticky_header', array(
    'type'        => 'checkbox',
    'label'       => __('Sticky header', 'mindad'),
    'description' => __('If enabled, the header will always stick to the top.', 'mindad'),
    'section'     => 'header_settings',
    'settings'    => 'mindad_sticky_header',
));

?>